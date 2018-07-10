<?php

function db_connect() {
    $connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect($connection);
    return $connection;
}

function confirm_db_connect($connection) {
    if ($connection->connect_errno) {
        $msg = "Database connection failed: ";
        $msg .= $connection->connect_error;
        $msg .= " (" . $connection->connect_errno . ")";
        exit($msg);
    }
}

function db_disconnect($connection) {
    if (isset($connection)) {
        $connection->close();
    }
}

////MySqli methods and properties used in OOP
//
////mysqli_query($db, $sql);
//$db->query($sql);
//
////mysqli_real_escape_string($db, $string);
//$db->escape_string(($string));
//
////mysqli_affected_rows($db);
//$db->affected_rows;
//
////mysqli_insert_id($db);
//$db->insert_id;
//
//$db = new mysqli($server, $user, $pwd, $db_name);
//$result = $db->query($sql);
//
////mysqli_fetch_assoc($result);
//$result->fetch_assoc();
//
////mysqli_free_result($result);
//$result->free();
//
////mysqli_num_rows($result);
//$result->num_rows;
//
//$result->fetch_assoc();     //associative array
//$result->fetch_row();       //basic array
//$result->fetch_array();     //assoc, row, or both
//$result->fetch_object();    //crude object (not recomendate)