<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <input type="hidden" name="id" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <?php
    //   include "config.php";
    $limit=4;
      $q="select * from post as p join category as c on p.category=c.category_id order by post_id desc limit {$limit} ;";
      $r=mysqli_query($con,$q) or die("Error in query");
      // die();
      if (mysqli_num_rows($r)>0) {
          # code...
          while ($row = mysqli_fetch_array($r)) {
      ?>
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <div class="recent-post">
            <a class="post-img" href="single.php?id=<?php echo $row['post_id']; ?>">
                <img src="./admin/upload/<?php echo $row['post_img']; ?>" alt="loading" />
            </a>
            <div class="post-content">
                <h5><a href="single.php?id=<?php echo $row['post_id']; ?>"><?php echo $row['title']; ?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php?id=<?php echo $row['category'];?>'><?php echo $row['category_name'];?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $row['post_date'];?>
                </span>
                <a class="read-more" href="single.php?id=<?php echo $row['post_id']; ?>">read more</a>
            </div>
        </div>

    </div>
    <?php } } ?>
    <!-- /recent posts box -->
</div>