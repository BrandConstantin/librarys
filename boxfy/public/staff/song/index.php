<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php
$current_page = $_GET['page'] ?? 1;
$per_page = 5;
$total_page = Song::count_all();

$pagination = new Pagination($current_page, $per_page, $total_page);

$sql = "SELECT * FROM muzic ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$songs = Song::find_by_sql($sql);
?>
<?php $page_title = 'Songs'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <div class="song listing">
        <h1>Songs</h1>
        <div class="table-responsive-md">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <td colspan="8">
                            <div class="actions">
                                <a class="action" href="<?php echo url_for('/staff/song/new.php'); ?>">Add Song</a>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-primary">
                        <th>ID</th>
                        <th>Artist</th>
                        <th>Song</th>
                        <th>Year</th>
                        <th>Likes</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>

                    <?php foreach ($songs as $song) { ?>
                        <tr>
                            <td><?php echo h($song->id); ?></td>
                            <td><?php echo h($song->artist_song); ?></td>
                            <td><?php echo h($song->name_song); ?></td>
                            <td><?php echo h($song->year); ?></td>
                            <td><?php echo h($song->likes); ?></td>
                            <td><a class="action" href="<?php echo url_for('/staff/song/show.php?id=' . h(u($song->id))); ?>">View</a></td>
                            <td><a class="action" href="<?php echo url_for('/staff/song/edit.php?id=' . h(u($song->id))); ?>">Edit</a></td>
                            <td><a class="action" href="<?php echo url_for('/staff/song/delete.php?id=' . h(u($song->id))); ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
        $url = url_for('/staff/song/index.php');
        echo $pagination->page_links($url);
        ?>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
