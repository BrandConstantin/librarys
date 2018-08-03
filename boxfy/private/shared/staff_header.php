<?php
if (!isset($page_title)) {
    $page_title = 'Admin Area';
}
?>

<!doctype html>

<html lang="en">
    <head>
        <title>BoxFy - <?php echo h($page_title); ?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo url_for('/assets/bootstrap/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" media="all" href="<?php echo url_for('/assets/staff.css'); ?>" />

        <!-- scripts ////////////////////////////// -->
        <!-- Librerías adicionales -->
        <script src="<?php echo url_for('/assets/jquery.min.js'); ?>"></script>
        <script src="<?php echo url_for('/assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    </head>

    <body>
        <div class="container">
            <header>
                <h1>
                    <a href="<?php echo url_for('/index.php'); ?>">
                        <img alt="boxfy" class="rounded-circle" src="<?php echo url_for('/images/logo.png') ?>" /><br />
                        BoxFy
                    </a>
                </h1>   
                <navigation>
                    <ul class="nav justify-content-end nav-tabs">
                        <?php if ($session->is_logged_in()) { ?>
                            <li><a class="nav-link" href="<?php echo url_for('/staff/index.php'); ?>">Home</a></li>
                            <li><a class="nav-link" href="<?php echo url_for('/staff/mi_perfil'); ?>">Mi Perfil</a></li>
                            <li><a class="nav-link" href="<?php echo url_for('/staff/#'); ?>">Politica de Privacidad</a></li>
                            <li><a class="nav-link" href="<?php echo url_for('/staff/logout.php'); ?>">Logout</a></li>
                            <li><a class="nav-link disabled" href="#"><span><?php echo "User: ".$session->username; ?></span></a></li>
                        <?php } ?>
                    </ul>
                </navigation> 
            </header>   
            
            <?php echo display_session_message(); ?>
