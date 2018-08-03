<?php
require_once('../../../private/initialize.php');

require_login();

if (is_post_request()) {

    // Create record using post parameters
    $args = $_POST['song'];

    $song = new Song($args);
    $result = $song->save();

    if ($result === true) {
        $new_id = $song->id;
        $session->message('The song was added successfully.');
        redirect_to(url_for('/staff/song/show.php?id=' . $new_id));
    } else {
        // show errors
    }
} else {
    // display the form
    $song = new Song;
}
?>

<?php $page_title = 'Add Song'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="btn btn-dark" href="<?php echo url_for('/staff/song/index.php'); ?>">&laquo; Back to List</a>

    <div class="song new">
        <h1>Add Song</h1>

        <?php echo display_errors($song->errors); ?>

        <form action="<?php echo url_for('/staff/song/new.php'); ?>" method="post" class="needs-validation">

            <?php include('form_fields.php'); ?>

            <div id="operations">
                <button type="submit" class="btn btn-success">Confirm</button>
            </div>
        </form>       
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
