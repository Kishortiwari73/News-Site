<?php
include "config.php";
session_start();
if (isset($_POST['submit'])) {
    # code...
    if (!empty($_FILES['new-image']['name'])) {
        # code...678O
        $fn = $_FILES['new-image']['name'];
        $tmp_name = $_FILES['new-image']['tmp_name'];
        $size = $_FILES['new-image']['size'];
        // $date=date('d-M,Y');
        $author=$_SESSION['user_id'];
        $iwtn= strtolower(end(explode('.',$fn)));
        $error=array();
        $myarray=array("jpg","png","jpeg");
        if (in_array($iwtn,$myarray)==false) {
            # code...
            $error[]="<h1 class='text-danger text-uppercase'>this type of file is not support please provide jpg or png or jpeg</h1>";
        }
        if ($size > 2097152) {
            # code...
            $error[]="<h1 class='text-danger text-uppercase'>file size must be less than 2mb </h1>";
        }
        if (empty($error)==true) {
        
        move_uploaded_file($tmp_name,"./upload/".$fn);
        // if ($r5) {
        //     # code...
        //     header("location:{$location}post.php");
        // }

        }else{
            print_r($error);
        }

        // mera($_FILES);
    }else{
        $fn=$_POST['old-image'];
    }
    echo $q2="select * from post where post_id='{$_POST['post_id']}' ;";
    $r2= mysqli_query($con,$q2);
    // while ($row=mysqli_fetch_array($r2)) {
    //     # code...
    //     mera($row);
    // }
    // die();
    $row1=mysqli_fetch_array($r2);
    // mera($row1);
    if ($_POST['role']==$row1['category']) {
        # code...
        $q="update post set title='{$_POST['post_title']}' ,description='{$_POST['postdesc']}',category='{$_POST['role']}',post_img='{$fn}' where post_id='{$_POST['post_id']}';";
        $r=mysqli_query($con,$q) or die("Error");
        header("Location:{$location}post.php");
    }else {
        # code...
        $q="update category set post=post-1  where category_id='{$row1['category']}';";//2
        $q.="update category set post=post+1  where category_id='{$_POST['role']}' ;";
        $q.="update post set title='{$_POST['post_title']}' ,description='{$_POST['postdesc']}',category='{$_POST['role']}',post_img='{$fn}' where post_id='{$_POST['post_id']}';";
        $r=mysqli_multi_query($con,$q) or die("Error");
        header("Location:{$location}post.php");

    }
    

}


?>