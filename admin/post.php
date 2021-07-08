<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Posts</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-post.php">add post</a>
            </div>
            <?php
            // include "config.php";
            $page = (isset($_GET['page'])) ? $_GET['page']  :  1 ;
            $limit=4;
            $offset=($page-1)*$limit;
            if ($_SESSION['role']==1) {
                # code...
                $q="select p.post_id,p.title,c.category_name,p.post_date,u.first_name from post as p join
            category as c on p.category=c.category_id join 
            user as u on p.author=u.user_id order by post_id desc limit {$offset},{$limit} ;";
            }
            elseif ($_SESSION['role']==0) {
                # code...
                $q="select p.post_id,p.title,c.category_name,p.post_date,u.first_name from post as p join
            category as c on p.category=c.category_id join 
            user as u on p.author=u.user_id where u.user_id={$_SESSION['user_id']}  order by post_id desc limit {$offset},{$limit} ;";
            }
            else{
                echo "cannot get record";
            }
            $r=mysqli_query($con,$q) or die("Error in query");
            // die();
            if (mysqli_num_rows($r)>0) {
                # code...
            ?>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Author</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_array($r)) {
                        # code...
                    
                    ?>
                    <tbody>
                        <tr>
                            <td class='id'><?php echo $row['post_id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['category_name'];?></td>
                            <td><?php echo $row['post_date'];?></td>
                            <td><?php echo $row['first_name'];?></td>
                            <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id']; ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-post.php?id=<?php echo $row['post_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
                <?php
                if ($_SESSION['role']==1) {
                    # code...
                    $q1="select * from post;";
                }
                else {
                    # code...
                    $q1="select * from post where author ={$_SESSION['user_id']} ;";
                }
                
                $r1=mysqli_query($con,$q1) or die("BROTHER QUERY ERROR");
                $tr=mysqli_num_rows($r1);
                $limit=4;
                $tp=ceil($tr/$limit); 
                echo " <ul class='pagination admin-pagination'>"; 
                $page = (isset($_GET['page'])) ? $_GET['page']  :  1 ;
                if ($page >1) {
                    # code...
                    $n=$page-1;
                    echo "<li><a href='post.php?page={$n}' >pre</a></li>";
                }  
                for ($i=1; $i <=$tp ; $i++) { 
                    # code...
                    echo "<li><a href='post.php?page={$i}'>{$i}</a></li>";
                }
                if ($tp > $page) {
                    # code...
                    $m=$page+1;
                    echo "<li><a href='post.php?page={$m}' >Next</a></li>";
                }
                echo "</ul>";            
                ?>
                <!-- <ul class='pagination admin-pagination'>
                    <li class="active"><a>1</a></li>
                    <li><a>2</a></li>
                    <li><a>3</a></li>
                </ul> -->
            </div>
            <?php  } ?>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>