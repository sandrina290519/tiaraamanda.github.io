<?php
$servername = "localhost";
$user = "root";
$pass = "" ;
$db = "pesanan";

$conn = mysqli_connect($servername, $user, $pass, $db);

if (!$conn) {
    die("Gagal Terhubung". mysqli_connect_error());
}
// echo "connected successfully";
?>