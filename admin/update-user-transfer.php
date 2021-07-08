<?php
session_start();
include './config.php';
if (!isset($_SESSION['username'])) {
    # code...
    header("Location:{$location}");
}

if (isset($_POST['submit'])) {
    # code...


$user_id=mysqli_real_escape_string($con,$_POST['user_id']);
$fname=mysqli_real_escape_string($con,$_POST['fname']);
$lname=mysqli_real_escape_string($con,$_POST['lname']);
$user=mysqli_real_escape_string($con,$_POST['user']);
$role=mysqli_real_escape_string($con,$_POST['role']);
$q3="update user set first_name='{$fname}',last_name='{$lname}',username='{$user}',role='{$role}' where user_id='{$user_id}';";
// die();
$r3=mysqli_query($con,$q3) or die("<h1>BROTHER ERROR IN SELECT QUERY !! </h1>");
if ($r3) {
    # code...
    header("Location:./users.php");
}
else{
    die("<h1 class='text-center text-uppercase text-danger '>BROTHER error </h1>");

}

}


?>