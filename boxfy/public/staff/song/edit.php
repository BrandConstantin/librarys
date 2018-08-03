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

    // Save record using post parameters
    $args = $_POST['song'];

    $song->merge_attributes($args);
    $result = $song->save();

    if ($result === true) {
        $session->message('The song was updated successfully.');
        redirect_to(url_for('/staff/song/show.php?id=' . $id));
    } else {
        // show errors
    }
} else {

    // display the form
}
?>

<?php $page_title = 'Edit Song'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="btn btn-dark" href="<?php echo url_for('/staff/song/index.php'); ?>">&laquo; Back to List</a>

    <div class="song edit">
        <h1>Edit: <?php echo h($song->name()); ?></h1>

        <?php echo display_errors($song->errors); ?>

        <form action="<?php echo url_for('/staff/song/edit.php?id=' . h(u($id))); ?>" method="post">

            <?php include('form_fields.php'); ?>

            <div id="operations">
                <input type="submit" class="btn btn-success" value="Edit Song" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
