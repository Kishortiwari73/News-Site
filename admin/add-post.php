<?php include "header.php"; ?>
<?php
if (isset($_POST['save'])) {
// include './config.php';
$post_title=mysqli_real_escape_string($con,$_POST['post_title']);
$postdesc=mysqli_real_escape_string($con,$_POST['postdesc']);
$category=mysqli_real_escape_string($con,$_POST['category']);
$q3="select title,description,category from post where title='{$post_title}' and description='{$postdesc}' and category='{$category}';";
$r3=mysqli_query($con,$q3) or die("<h1>BROTHER ERROR IN SELECT QUERY !! </h1>");
if (mysqli_num_rows($r3)>0) {
    # code...
    die("<h1 class='text-center text-uppercase text-danger '>BROTHER This post is already posted  </h1>");
}
else {
    # code...
    // echo "<h1 class='text-center '>i am here</h1>";
    if (isset($_FILES['fileToUpload'])) {
        # code...
        // mera($_FILES);
        $name = $_FILES['fileToUpload']['name'];
        $tmp_name = $_FILES['fileToUpload']['tmp_name'];
        $size = $_FILES['fileToUpload']['size'];
        $date=date('d-M,Y');
        $author=$_SESSION['user_id'];
        $iwtn= strtolower(end(explode('.',$name)));
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
            # code...
            // die();
        $q5="insert into post(title,description,category,post_date,author,post_img) 
        values('{$post_title}','{$postdesc}','{$category}','{$date}','{$author}','{$name}');";
        $q5.="update category set post=post+1 where category_id='{$category}';";
        $r5=mysqli_multi_query($con,$q5) or die("<h1>BROTHER ERROR IN SELECT QUERY !! </h1>");
        move_uploaded_file($tmp_name,"./upload/".$name);
        if ($r5) {
            # code...
            header("location:{$location}post.php");
        }

        }else{
            print_r($error);
        }
        
        

    }else {
        # code...
        echo "ERROR IN UPLOAD";
    }

} 
}   
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Post</h1>
            </div>

            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <?php
                        // include './config.php';
                        $q="select * from category;";
                        $r=mysqli_query($con,$q) or die("<h1>BROTHER ERROR IN SELECT QUERY </h1>");
                        // mera($r);
                        if (mysqli_num_rows($r)>0) {
                            echo "<select class='form-control' name='category'>";
                            while ($row=mysqli_fetch_array($r)){
                                echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                            }
                            echo "</select>";
                            # code...
                        }
                        ?>
                        <!-- <select name="category" class="form-control">
                            <option value="" selected> Select Category</option>
                        </select> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post image</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>