<?php 
include_once "../config.php";

session_start();
session_unset();
session_destroy();

header("Location: ".BASE_PATH."/pages/login.php");
exit();