<?php
session_start();

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="sumal";

$conn=mysqli_connect($dbhost,$dbuser,$dbpass);
mysqli_select_db($conn,$dbname);
?>
