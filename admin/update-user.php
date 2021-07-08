<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <?php
            // include './config.php';
            $id = (isset($_GET['id'])) ? $_GET['id'] : "" ;
            $q="select user_id,first_name,last_name,username,role_id from user as u join role as r on u.role=r.role_id where user_id='{$id}' ;";
            $r=mysqli_query($con,$q) or die("<h1>BROTHER ERROR IN SELECT QUERY </h1>");
            // mera($r);
            if (mysqli_num_rows($r)>0) {
                while ($row=mysqli_fetch_array($r)) {
                    # code..
                    // mera($row);
            
            ?>
            <div class="col-md-offset-4 col-md-4">
                <!-- Form Start -->
                <form action="update-user-transfer.php" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user" class="form-control" value="<?php echo $row['username']; ?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <?php
                        // include './config.php';
                        $q1="select * from role;";
                        $r1=mysqli_query($con,$q1) or die("<h1>BROTHER ERROR IN SELECT QUERY </h1>");
                        // mera($r);
                        if (mysqli_num_rows($r1)>0) {
                            echo "<select class='form-control' name='role'>";
                            while ($row1=mysqli_fetch_array($r1)){
                                mera($row1);
                                if ($row['role_id']==$row1['role_id']) {
                                    # code...
                                    $select="selected";
                                }
                                else {
                                    $select="";
                                }
                                echo "<option {$select} value='{$row1['role_id']}'>{$row1['role_name']}</option>";
                            }
                            echo "</select>";
                            # code...
                        }
                        ?>
                        
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                </form>
                <!-- /Form -->
            </div>
            <?php }} ?>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>