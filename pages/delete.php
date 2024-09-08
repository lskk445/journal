<?php
include_once '../config.php';

include_once ROOT_PATH.'/includes/db.php';
include_once ROOT_PATH . '/includes/header.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: ".BASE_PATH."/pages/login.php");
    exit();
}

if(isset($_GET['id'])) {

    $rs = mysqli_query($con, "delete from journal_entries where id = ".$_GET['id']);
    if($rs) {
        header("Location: ".BASE_PATH."/pages/journal.php");
        exit();
    }
}