<?php

include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM tb_nilai WHERE id='$id'");

header("Location: daftar.php");

?>
