<?php require_once('../private/initialize.php'); ?>

<?php
// Get requested ID
$id = $_GET['id'] ?? false;

if (!$id) {
    redirect_to('song.php');
}

// Find bicycle using ID
$song = Song::find_by_id($id);
?>

<?php $page_title = 'Detail: ' . $song->name(); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
    <a class="btn btn-dark" href="<?php echo url_for('song.php'); ?>">&laquo; Back to List</a>

    <br/>
    <br/>

    <div class="table-responsive-md">
        <table class="table table-striped table-dark">
            <tr>
                <td>
                    <ul>
                        <li><span>Artist: </span><?php echo h($song->artist_song); ?></li>
                        <li><span>Song: </span><?php echo h($song->name_song); ?></li>
                        <li><span>Year: </span><?php echo h($song->year); ?></li>
                        <li><span>Likes: </span><?php echo h($song->likes); ?></li>
                        <li><span>Url: </span><?php echo h($song->url_song); ?></li>
                    </ul>
                </td>
                <td>AQUI VA EL VIDEO</td>
            </tr>

        </table>
    </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
