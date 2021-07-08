<?php include "header.php";
if ($_SESSION['role']==0) {
    # code...
    header("Location:{$location}post.php");
}

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Users</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-user.php">add user</a>
            </div>
            <?php
            // include './config.php';
            $limit=4;
            $page = (isset($_GET['page'])) ? $_GET['page'] : 1 ;
            $offset=($page-1)*$limit;
            $q="select user_id,first_name,last_name,username,role_name from user as u join role as r on u.role=r.role_id order by  user_id desc 
            limit {$offset},{$limit} ;";
            $r=mysqli_query($con,$q) or die("<h1>BROTHER ERROR IN SELECT QUERY </h1>");
            // mera($r);
            if (mysqli_num_rows($r)>0) {
                
            
            ?>
            
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($r)){
                    ?>
                        <tr>
                            <td class='id'><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['first_name']."\n"; ?><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['role_name']; ?></td>
                            <td class='edit'><a href='update-user.php?id=<?php echo $row['user_id']; ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-user.php?id=<?php echo $row['user_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
                $q4="select * from user;";
                $r4=mysqli_query($con,$q4) or die("Couldn't bring user'");
                if (mysqli_num_rows($r4)>0) {
                    # code...
                    $tr=mysqli_num_rows($r4);
                }
                $limit=4;
                $tp=ceil($tr/$limit);
                echo "<ul class='pagination admin-pagination'>";
                if ($page > 1) {
                    # code...
                    $n=$page-1;
                    echo "<li class='active'><a href='users.php?page={$n}' >pre</a></li>";
                }
                for ($i=1; $i <=$tp ; $i++) {
                if (isset($_GET['page'])) {
                    # code...
                    $value1="active";

                }
                else{
                    $value1="";
                }
                echo "<li class='$value1'><a href='users.php?page={$i}' >{$i}</a></li>";
                }
                if ($tp>$page) {
                    # code...
                    $n1=$page+1;
                    echo "<li class='active'><a href='users.php?page={$n1}' >Next</a></li>";
                }
                echo "</ul>";
                
                
            //     if ($page==1 ) {
            //         # code...
            //         $value="none";
            //     }
            //     else{
            //         $value="inline-block";
            //     }
            //     // $page = (isset($_GET['page'])) ? $_GET['page'] : 1 ;
            //     echo "<ul class='pagination admin-pagination'>";
                
            //     for ($j=1; $j <=$tp ; $j++) { 
            //         $k=$j-1;
            //     }
                
            //     echo "<li style='display: {$value} ' class='active'><a href='users.php?page={$k}'><</a></li> ";
            //     for ($i=1; $i <=$tp ; $i++) { 
            //         # code...
            //         // $k=$i-1;
            //         // echo "<li style='display: {$value} ' class='active'><a href='users.php?page={$k}'><</a></li> ";
            //         echo "<li><a href='users.php?page={$i}' >{$i}</a></li>";
            //     }
            //     // echo "<li class='active'><a>></a></li>";
                
            //     if ($page > 0 ) {
            //         # code...
            //         $value1="inline-block";
            //     }
            //     else{
            //         $value1="none";
            //     }
            //     if ($page > $tp) {
            //         # code...
            //         for ($j11=1; $j11 <=$tp ; $j11++) { 
            //                     $k12=$j11-1;
            //                 }
            //         echo "<li style='display: {$value1} ' class='active'><a href='users.php?page={$k12}'><</a></li> ";

            //     }
            //     else{
            //         for ($j13=1; $j13 <=$tp ; $j13++) { 
            //             $k14=$j13+1;
            // echo "<li style='display: {$value1} ' class='active'><a href='users.php?page={$k14}'>></a></li> ";

            //         }

            //     }
            //     // if ($page > $tp) {
            //     //     # code...
            //     //     for ($j=1; $j <=$tp ; $j++) { 
            //     //         $k=$j-1;
            //     //     }
                    
            //     //     echo "<li style='display: {$value} ' class='active'><a href='users.php?page={$k}'><</a></li> ";

            //     // }
            //     // else{
            //     // echo "<li style='display: {$value1} ' class='active'><a href='users.php?page={$k1}'>></a></li> ";
                    
            //     // }
            //     echo "</ul>";
                
                ?>
                
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>