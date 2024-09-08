<?php

date_default_timezone_set("Asia/Kolkata");
 

header("Location: /diary/pages/login.php");
exit();

$con = mysqli_connect('localhost','root','Abcd@1234');
if($con){
    echo "db connection successful";
}

echo "Siva Lokam's Personal diary";

