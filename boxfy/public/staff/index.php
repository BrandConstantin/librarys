<?php require_once('../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php $page_title = 'Admin Area'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="main">
    <div class="row">
        <div class="col-md-12">           
            <navigation>
                <ul class="nav flex-column">
                    <?php if ($session->is_logged_in()) { ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo url_for('/staff/song/index.php'); ?>">Songs</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo url_for('/staff/admin/index.php'); ?>">Users</a></li>                            
                        <?php } ?>
                </ul>
            </navigation> 
        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
