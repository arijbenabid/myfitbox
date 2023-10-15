<?php
$email = $_POST['email'];
$password = $_POST['password'];
include "connect.php";

$req = "SELECT * FROM administrateur WHERE email = '". mysqli_real_escape_string($con,$email) ."' AND motdepasse = '". mysqli_real_escape_string($con,$password) ."'" ;

 $res=mysqli_query($con,$req);
if (mysqli_num_rows($res) == 1) {
    header("Location:dash.php");
 }
 else {
   echo"<script>alert('incorrect user name or password')</script>";
   echo "<script>window.location.href='http://localhost:8080/fitbox/admin/'</script>";
 }




    
     







?>