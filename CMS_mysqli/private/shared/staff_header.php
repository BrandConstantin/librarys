<?php 
if(!isset($page_title)){
    $page_title = 'Staff Area';
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>GBI <?php echo $page_title; ?></title>
        <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css'); ?>" />
    </head>
        <body>
            <header>
                <h1>Staff Area</h1>
            </header>
        <navigation>
            <ul>
                <li>User: <?php echo $_SESSION['username'] ?? ''; ?></li>
                <li><a href="<?php echo url_for('/staff/index.php'); ?>">Menu</a></li>
                <li><a href="<?php echo url_for('/staff/logout.php'); ?>">Logout</a></li>
            </ul>
        </navigation>
        <?php echo display_session_message(); ?>