<?php include "header.php"; ?>
<?php
// include './config.php';
$id = (isset($_GET['id'])) ? $_GET['id'] : "" ;
$q="select * from post where post_id='{$id}';";
$r=mysqli_query($con,$q) or die("<h1>BROTHER ERROR IN SELECT QUERY </h1>");
// mera($r);
if (mysqli_num_rows($r)>0) {
    while ($row=mysqli_fetch_array($r)) {
        # code..
        // mera($row);

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->
                <form action="update-post-transfer-data.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="post_id" class="form-control" value="<?php echo $row['post_id'];?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Title</label>
                        <input type="text" name="post_title" class="form-control" id="exampleInputUsername"
                            value="<?php echo $row['title'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" class="form-control" required rows="5"><?php echo $row['description'];?>
                </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">Category</label>
                        <?php
                        // include './config.php';
                        $q1="select * from category ;";
                        $r1=mysqli_query($con,$q1) or die("<h1>BROTHER ERROR IN SELECT QUERY </h1>");
                        // mera($r);
                        if (mysqli_num_rows($r1)>0) {
                            echo "<select class='form-control' name='role'>";
                            while ($row1=mysqli_fetch_array($r1)){
                                // mera($row1);
                                if ($row['category']==$row1['category_id']) {
                                    # code...
                                    $select="selected";
                                }
                                else {
                                    $select="";
                                }
                                echo "<option {$select} value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                            }
                            echo "</select>";
                            # code...
                        }
                        ?>
                        
                    </div>
                    <div class="form-group">
                        <label for="">Post image</label>
                        <input type="file" name="new-image">
                        <img src="upload/<?php echo $row['post_img'];?>" height="150px">
                        <input type="hidden" name="old-image" value="<?php echo $row['post_img'];?>">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                </form>
                <!-- Form End -->
            </div>
            <?php }} ?>

        </div>
    </div>
</div>
<?php include "footer.php"; ?>