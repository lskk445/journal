<?php

$servername = 'localhost';
$username='root';
$password = 'Abcd@1234';
$dbname = 'journal_db';


$con = new mysqli($servername,$username,$password,$dbname);

if($con->connect_error){
    die("DB connection failed ".$con->connect_error);
}