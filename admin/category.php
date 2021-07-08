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
                <h1 class="admin-heading">All Categories</h1>
            </div>

            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <?php
            // include './config.php';
            $limit=4;
            $page = (isset($_GET['page'])) ? $_GET['page'] : 1 ;
            $offset=($page-1)*$limit;
            $q="select * from category order by  category_id desc limit {$offset},{$limit} ;";
            $r=mysqli_query($con,$q) or die("<h1>BROTHER ERROR IN SELECT QUERY </h1>");
            // mera($r);
            if (mysqli_num_rows($r)>0) {
                
            
            ?>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    
                    <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($r)){
                    ?>
                        <tr>
                            <td class='id'><?php echo $row['category_id']; ?></td>
                            <td><?php echo $row['category_name']."\n"; ?></td>
                            <td><?php echo $row['post']; ?></td>
                            <td class='edit'><a href='update-category.php?id=<?php echo $row['category_id']; ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php?id=<?php echo $row['category_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
                $q4="select * from category;";
                $r4=mysqli_query($con,$q4) or die("Couldn't bring category'");
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
                    echo "<li class='active'><a href='category.php?page={$n}' >pre</a></li>";
                }
                for ($i=1; $i <=$tp ; $i++) {
                if (isset($_GET['page'])) {
                    # code...
                    $value1="active";

                }
                else{
                    $value1="";
                }
                echo "<li class='$value1'><a href='category.php?page={$i}' >{$i}</a></li>";
                }
                if ($tp>$page) {
                    # code...
                    $n1=$page+1;
                    echo "<li class='active'><a href='category.php?page={$n1}' >Next</a></li>";
                }
                echo "</ul>";
                
                
                ?>
                
            </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
