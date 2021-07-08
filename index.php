<?php include 'header.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <?php
            // include "config.php";
            $page = (isset($_GET['page'])) ? $_GET['page']  :  1 ;
            $limit=4;
            $offset=($page-1)*$limit;
                # code...
            $q="select p.post_id,p.title,c.category_name,p.post_date,u.first_name,p.description,p.post_img,p.category,p.author from post as p join
            category as c on p.category=c.category_id join 
            user as u on p.author=u.user_id order by post_id desc limit {$offset},{$limit} ;";
            $r=mysqli_query($con,$q) or die("Error in query");
            // die();
            if (mysqli_num_rows($r)>0) {
                # code...
                while ($row = mysqli_fetch_array($r)) {
            ?>
                <div class="post-container">
                    <div class="post-content">
                        <div class="row">
                        <div class="col-md-4">
                                <a class="post-img" href="single.php?id=<?php echo $row['post_id']; ?>"><img src="./admin/upload/<?php echo $row['post_img']; ?>" alt="loading" width="200px" height="200px" /></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php?id=<?php echo $row['post_id']; ?>'><?php echo $row['title']; ?></a>
                                    </h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php?id=<?php echo $row['category'];?>'><?php echo $row['category_name'];?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php?id=<?php echo $row['author'];?>'><?php echo $row['first_name'];?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $row['post_date'];?>
                                        </span>
                                    </div>
                                    <p class="description">
                                    <?php echo  substr($row['description'],0,280)."....";?>
                                    </p>
                                    <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']; ?>'>read more</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div><!-- /post-container -->
                <?php } } ?>
                <?php
                
                $q1="select * from post;";
                $r1=mysqli_query($con,$q1) or die("BROTHER QUERY ERROR");
                $tr=mysqli_num_rows($r1);
                $limit=4;
                $tp=ceil($tr/$limit); 
                echo " <ul class='pagination admin-pagination'>"; 
                $page = (isset($_GET['page'])) ? $_GET['page']  :  1 ;
                if ($page >1) {
                    # code...
                    $n=$page-1;
                    echo "<li><a href='index.php?page={$n}' >pre</a></li>";
                }  
                for ($i=1; $i <=$tp ; $i++) { 
                    # code...
                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                }
                if ($tp > $page) {
                    # code...
                    $m=$page+1;
                    echo "<li><a href='index.php?page={$m}' >Next</a></li>";
                }
                echo "</ul>";            
                ?>
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>