<?php

include "koneksi.php";
include "function.php";

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$mata_kuliah = $_POST['mata_kuliah'];
$nilai = $_POST['nilai'];

$grade = grade($nilai);

mysqli_query($conn,"INSERT INTO tb_nilai
(nama,nim,mata_kuliah,nilai,grade)
VALUES
('$nama','$nim','$mata_kuliah','$nilai','$grade')");

header("Location: daftar.php");

?>
