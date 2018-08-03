<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'All Songs'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

    <div id="page">
        <div class="intro">
            <img class="inset" src="<?php echo url_for('/images/boxfy.png') ?>" />
            <h2>La página donde se mostrara la musica</h2>
        </div>

        <div class="table-responsive-md">
            <table class="table table-striped table-dark">
                <tr class="table-primary">
                    <th>Artist Song</th>
                    <th>Name Song</th>
                    <th>Year</th>
                    <th>Likes</th>
                    <th>&nbsp;</th>
                </tr>

                <?php
                $songs = Song::find_all();
                ?>
                <?php foreach ($songs as $song) { ?>
                    <tr>
                        <td><?php echo h($song->artist_song); ?></td>
                        <td><?php echo h($song->name_song); ?></td>
                        <td><?php echo h($song->year); ?></td>
                        <td><?php echo h($song->likes); ?></td>
                        <td><a href="detail.php?id=<?php echo $song->id; ?>">View</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>        
    </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>