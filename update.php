<?php

include "koneksi.php";
include "function.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$mata_kuliah = $_POST['mata_kuliah'];
$nilai = $_POST['nilai'];

$grade = grade($nilai);

mysqli_query($conn, "UPDATE tb_nilai SET
nama='$nama',
nim='$nim',
mata_kuliah='$mata_kuliah',
nilai='$nilai',
grade='$grade'
WHERE id='$id'");

header("Location: daftar.php");

?>
