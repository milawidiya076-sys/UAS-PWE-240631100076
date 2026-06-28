<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "db_nilai";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi Database Gagal : " . mysqli_connect_error());
}
?>
