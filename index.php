<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";
include "function.php";

// Total data
$jumlah = jumlahData($conn);

// Ambil 5 data terbaru
$data = mysqli_query($conn, "SELECT * FROM tb_nilai ORDER BY id DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Data Nilai Mahasiswa</title>

    <link rel="stylesheet" href="css/style.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

<!-- Navbar -->

<div class="navbar">

    <h2> Sistem Data Nilai Mahasiswa</h2>

</div>


<div class="container">

<div class="card">

<h1>Dashboard</h1>

<p>
Selamat datang di Sistem Informasi Data Nilai Mahasiswa.
Kelola data mahasiswa dengan mudah, cepat dan efisien.
</p>


<div class="box-total">

<h3>Total Data Mahasiswa</h3>

<div class="angka">
    <?= $jumlah ?>
</div>

</div>

<div class="menu">

<a href="daftar.php" class="btn biru">
 Daftar Data
</a>

<a href="tambah.php" class="btn hijau">
 Tambah Data
</a>

</div>

<hr style="margin:40px 0;">


<h2 style="color:#5C4033;margin-bottom:20px;">
 Data Mahasiswa Terbaru
</h2>

<table>

<tr>

<th>No</th>
<th>Nama</th>
<th>NIM</th>
<th>Mata Kuliah</th>
<th>Nilai</th>
<th>Grade</th>

</tr>

<?php

$no=1;

while($d=mysqli_fetch_array($data)){

?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['nama'] ?></td>

<td><?= $d['nim'] ?></td>

<td><?= $d['mata_kuliah'] ?></td>

<td><?= $d['nilai'] ?></td>

<td><?= $d['grade'] ?></td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>
