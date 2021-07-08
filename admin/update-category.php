<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="adin-heading"> Update Category</h1>
            </div>
            <?php
            // include './config.php';
            $id = (isset($_GET['id'])) ? $_GET['id'] : "" ;
            $q="select * from category where category_id ='{$id}';";
            $r=mysqli_query($con,$q) or die("<h1>BROTHER ERROR IN SELECT QUERY </h1>");
            // mera($r);
            if (mysqli_num_rows($r)>0) {
                while ($row=mysqli_fetch_array($r)) {
                    # code..
                    // mera($row);
            
            ?>
            <div class="col-md-offset-3 col-md-6">
                <form action="update-category-transfer.php" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="cat_id" class="form-control" value="<?php echo $row['category_id']; ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>" placeholder="" required>
                    </div>
                    <input type="submit" name="update" class="btn btn-primary" value="Update" required />
                </form>
            </div>
            <?php }} ?>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>