<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "login_registration";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if(!$conn){
       die("something went wrong please try again;");

}

echo "connected succesfully";
