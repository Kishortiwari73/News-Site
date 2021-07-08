<?php





$servername ="localhost";
$username ="root";
$password ="";
$database ="project";
$con= mysqli_connect($servername,$username,$password,$database);
if (mysqli_connect_errno()) {
    die ("<h1>BROTHER ERROR IN CONNECTING</h1>".mysqli_connect_error($con));
    # code...
}
function mera($a)
{
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}
$location="http://localhost:8081/news-site1/admin/";
// session_start();
// if (!isset($_SESSION['username'])) {
//     # code...
//     header("Location:{$location}");
// }


?>