
<?php
session_start();
include './config.php';
if (!isset($_SESSION['username'])) {
    # code...
    header("Location:{$location}");
}

if (isset($_POST['update'])) {
    # code...
    echo "k";

$category_name=mysqli_real_escape_string($con,$_POST['cat_name']);
$category_id=mysqli_real_escape_string($con,$_POST['cat_id']);

echo $q3="update category set category_name='{$category_name}' where category_id='{$category_id}';";
// die();
$r3=mysqli_query($con,$q3) or die("<h1>BROTHER ERROR IN SELECT QUERY !! </h1>");
if ($r3) {
    # code...
    header("Location:./category.php");
}
else{
    die("<h1 class='text-center text-uppercase text-danger '>BROTHER error </h1>");

}

}


?>