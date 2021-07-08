<?php
session_start();
include "./config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php
            echo "<ul class='menu'>";
            $sel = (isset($_GET['id'])) ? "" : "active" ;
            echo "<li  ><a class='{$sel}' href='./index.php'>Home</a></li>";
            $q="select * from category where post >0;";
            $r=mysqli_query($con,$q) or die("<h1>BROTHER ERROR IN SELECT QUERY </h1>");
            $id = (isset($_GET['id'])) ? $_GET['id'] : "" ;
            // mera($r);
            // die();
            if (mysqli_num_rows($r)>0) {
                while ($row = mysqli_fetch_array($r)){
                    if ($id==$row['category_id']) {
                        # code...
                        $selected="active";
                    }
                    else {
                        $selected="";
                    }
                    echo "<li  ><a class='{$selected}' href='category.php?id={$row['category_id']}'>{$row['category_name']}</a></li>";
                }
            }
            echo "</ul>";
            ?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
