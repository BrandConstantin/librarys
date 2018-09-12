<?php

$db = new mysqli('localhost', 'oophp', 'lynda', 'oophp');

if($db->connect_errno){
    $error = $db->connect_errno;
}

$db->set_charset(('utf8'));