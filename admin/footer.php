<!-- Footer -->
<?php
// include "./config.php";
// session_start();
if (!isset($_SESSION['username'])) {
    # code...
    header("Location:{$location}");
}


?>

<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>© Copyright 2008-2021 News Block Website | Powered by <a href="">Ujwal dangi</a></span>
            </div>
        </div>
        
    </div>
</div>
<!-- /Footer -->
</body>
</html>
