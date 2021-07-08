<?php include "header.php"; ?>
<?php
if (isset($_POST['save'])) {
// include './config.php';
$fname=mysqli_real_escape_string($con,$_POST['fname']);
$lname=mysqli_real_escape_string($con,$_POST['lname']);
$user=mysqli_real_escape_string($con,$_POST['user']);
$password=mysqli_real_escape_string($con,md5($_POST['password']));
$role=mysqli_real_escape_string($con,$_POST['role']);
$q3="select username,password from user where username='{$user}' or password='{$password}';";
$r3=mysqli_query($con,$q3) or die("<h1>BROTHER ERROR IN SELECT QUERY !! </h1>");
if (mysqli_num_rows($r3)>0) {
    # code...
    die("<h1 class='text-center text-uppercase text-danger '>BROTHER USER or password is ALREADY EXIST </h1>");
}
else {
    # code...

$q1="insert into user (first_name,last_name,username,password,role) values ('{$fname}','{$lname}','{$user}','{$password}','{$role}');";
$r1=mysqli_query($con,$q1) or die("<h1>BROTHER ERROR IN SELECT QUERY </h1>");
// mera($r1);
// die();
if ($r1) {
    header("Location:./users.php");
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
                <h1 class="admin-heading">Add User</h1>
            </div>
            <!--  !we are adding user -->
            
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>/
                        <?php
                        // include './config.php';
                        $q="select * from role;";
                        $r=mysqli_query($con,$q) or die("<h1>BROTHER ERROR IN SELECT QUERY </h1>");
                        // mera($r);
                        if (mysqli_num_rows($r)>0) {
                            echo "<select class='form-control' name='role'>";
                            while ($row=mysqli_fetch_array($r)){
                                echo "<option value='{$row['role_id']}'>{$row['role_name']}</option>";
                            }
                            echo "</select>";
                            # code...
                        }
                        ?>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>


<?php include "footer.php"; ?>