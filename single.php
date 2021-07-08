<?php include 'header.php'; ?>
<div class="m "></div>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <?php
            // include "config.php";
            $id = (isset($_GET['id'])) ? $_GET['id']  :  "" ;
            
            $q="select p.post_id,p.title,c.category_name,p.post_date,u.first_name,p.description,p.post_img,p.category,p.author from post as p join
            category as c on p.category=c.category_id join 
            user as u on p.author=u.user_id where post_id='{$id}'  ;";
            $r=mysqli_query($con,$q) or die("Error in query");
            // die();
            if (mysqli_num_rows($r)>0) {
                # code...
                while ($row = mysqli_fetch_array($r)) {
            ?>
                <!-- post-container -->
                <div class="post-container">
                    <div class="post-content single-post">
                        <h3><?php echo $row['title']; ?></h3>
                        <div class="post-information">
                            <span>
                                <i class="fa fa-tags" aria-hidden="true"></i>
                                <a href="category.php?id=<?php echo $row['category'];?>"><?php echo $row['category_name'];?></a>
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
                        <img class="single-feature-image" src="./admin/upload/<?php echo $row['post_img']; ?>" alt="loading" />
                        <p class="description">
                        <?php echo $row['description'];?>
                        </p>
                    </div>
                </div>
                <!-- /post-container -->
                <?php } }?>
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>