<?php
require_once('../../../private/initialize.php');

require_login();

if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/song/index.php'));
}
$id = $_GET['id'];
$song = Song::find_by_id($id);
if ($song == false) {
    redirect_to(url_for('/staff/song/index.php'));
}

if (is_post_request()) {

    // Delete bicycle
    $result = $song->delete();
    $session->message('The song was deleted successfully.');
    redirect_to(url_for('/staff/song/index.php'));
} else {
    // Display form
}
?>

<?php $page_title = 'Delete Song'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="btn btn-dark" href="<?php echo url_for('/staff/song/index.php'); ?>">&laquo; Back to List</a>

    <div class="song delete">
        <h1>Delete Song</h1>
        <p>Are you sure you want to delete this item?</p>
        <p class="item"><?php echo h($song->name()); ?></p>

        <form action="<?php echo url_for('/staff/song/delete.php?id=' . h(u($id))); ?>" method="post">
            <div id="operations">
                <input type="submit" class="btn btn-danger" name="commit" value="Delete Song" />
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
