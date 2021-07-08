<?php

include './config.php';
if (!isset($_SESSION['username'])) {
    # code...
    header("Location:{$location}");
}

session_start();
session_unset();
session_destroy();
header("location:{$location}");

?>