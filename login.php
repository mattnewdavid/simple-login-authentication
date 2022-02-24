<?php
$us="";
$ps="";
require('database.php');
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    // $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    $hashedpassword=md5($password);
    $query = "SELECT * FROM loginform
    where name= '$name' AND password= '$hashedpassword'";
    $sql=mysqli_query($conn,$query);
   while ($row = mysqli_fetch_assoc($sql)){
       $us = $row['name'];
       $ps = $row['password'];
   }
   if($name == $us && $password == $ps){
       echo "Logged in";
   }
   else{
       echo "Incorrect";
   }}
?>