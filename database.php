<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "formbase";
$conn=mysqli_connect($host,$user,$password,$db) or 
die("Couldnt connect to database");
// mysqli_select_db($conn,$db) or
// die("Couldnt select database");
?>