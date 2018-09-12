<?php 
require_once('../../../private/initialize.php'); 

require_login();

if(is_post_request()){

// Handle form values sent by new.php
    $page = [];
    $page['subject_id'] = $_POST['subject_id'] ?? '';
    $page['position'] = $_POST['position'] ?? '';
    $page['content'] = $_POST['content'] ?? '';
    $page['page_name'] = $_POST['page_name'] ?? '';

    $result_set = insert_page($page);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/page/show.php?id=' . $new_id));

}else{
    redirect_to('/staff/pages/new.php');
}