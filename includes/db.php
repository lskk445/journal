<?php

$servername = 'localhost';
$username='root';
$password = 'Abcd@1234';
$dbname = 'journal_db';
/*
$servername = 'localhost';
$username='u592999880_todo';
$password = 'Password@123';
$dbname = 'u592999880_todo';

*/

$con = new mysqli($servername,$username,$password,$dbname);

if($con->connect_error){
    die("DB connection failed ".$con->connect_error);
}