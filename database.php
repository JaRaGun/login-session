<?php 
$host = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$connection = mysqli_connect($host, $username, $password, $dbname);

if(mysqli_connect_error()){
    die("Database connection failed: " . mysqli_connect_error());
}

?>