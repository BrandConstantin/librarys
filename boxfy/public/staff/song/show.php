<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$song = Song::find_by_id($id);
?>

<?php $page_title = 'Show Song: ' . h($song->name()); ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="btn btn-dark" href="<?php echo url_for('/staff/song/index.php'); ?>">&laquo; Back to List</a>
    <br/>
    <br/>

    <div class="table-responsive-md">
        <table class="table table-striped table-dark">
            <thead>
                <tr class="table-primary">
                    <td colspan="5">
                        <div class="actions">
                            <h5>Item: <?php echo h($song->name()); ?></h5>
                        </div>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Artist Song: <?php echo h($song->artist_song); ?></td>
                </tr>
                <tr>
                    <td>Name Song: <?php echo h($song->name_song); ?></td>
                </tr>
                <tr>
                    <td>Url Song: <?php echo h($song->url_song); ?></td>
                </tr>
                <tr>
                    <td>Year Song: <?php echo h($song->year); ?></td>
                </tr>
                <tr>
                    <td>Likes: <?php echo h($song->likes); ?></td>
                </tr>
            </tbody>
        </table>
    </div>    
</div>