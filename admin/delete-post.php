<?php
include './config.php';

session_start();
if (!isset($_SESSION['username'])) {
    # code...
    header("Location:{$location}");
}



$id = (isset($_GET['id'])) ? $_GET['id'] : "" ;
$q2="select * from post where post_id='{$id}' ;";
$r2= mysqli_query($con,$q2);
$row1=mysqli_fetch_array($r2);
$q="delete from post where post_id='{$id}';";
$q.="update category set post=post-1  where category_id='{$row1['category']}';";
$r=mysqli_multi_query($con,$q) or die("BROTHER ERROR IN QUERY OF DELETE");
unlink("./upload/".$row1['post_img']);

// die();
if ($r) {
    # code...
    // mera($r);
    header("Location:{$location}post.php");
}else {
    # code...
    die("BROTHER I KNOW EVERYTHING ABOUT HACKING!!!");
}




?>