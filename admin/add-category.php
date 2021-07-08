<?php include "header.php"; ?>
<?php
if (isset($_POST['save'])) {
// include './config.php';
$cat=mysqli_real_escape_string($con,$_POST['cat']);
$q3="select * from category where category_name='{$cat}';";
$r3=mysqli_query($con,$q3) or die("<h1>BROTHER ERROR IN SELECT QUERY !! </h1>");
if (mysqli_num_rows($r3)>0) {
    # code...
    die("<h1 class='text-center text-uppercase text-danger '>BROTHER category ALREADY EXIST </h1>");
}
else {
    # code...

$q1="insert into category(category_name) values ('{$cat}');";
$r1=mysqli_query($con,$q1) or die("<h1>BROTHER ERROR IN SELECT QUERY </h1>");
// mera($r1);
// die();
if ($r1) {
    header("Location:{$location}category.php");
    # code...
}
else {
    # code...
    
    die("<h1>BROTHER NOT YET INSERTED !! </h1>");
}
} 
}   
?> 

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <form action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
                <!-- /Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>