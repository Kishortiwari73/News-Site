<?php
include './config.php';

session_start();
if (!isset($_SESSION['username'])) {
    # code...
    header("Location:{$location}");
}




$id = (isset($_GET['id'])) ? $_GET['id'] : "" ;
$q="delete from user where user_id='{$id}';";
$r=mysqli_query($con,$q) or die("BROTHER ERROR IN QUERY OF DELETE");

// die();
if ($r) {
    # code...
    // mera($r);
    header("Location:users.php");
}else {
    # code...
    die("BROTHER I KNOW EVERYTHING ABOUT HACKING!!!");
}




?>