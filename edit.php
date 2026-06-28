<?php
include "koneksi.php";
include "function.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM tb_nilai WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Nilai</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<h1>Edit Data Nilai</h1>

<form action="update.php" method="POST">

<input type="hidden" name="id" value="<?= $data['id']; ?>">

<label>Nama Mahasiswa</label>
<input type="text" name="nama" value="<?= $data['nama']; ?>" required>

<label>NIM</label>
<input type="text" name="nim" value="<?= $data['nim']; ?>" required>

<label>Mata Kuliah</label>
<input type="text" name="mata_kuliah" value="<?= $data['mata_kuliah']; ?>" required>

<label>Nilai</label>
<input type="number" name="nilai" value="<?= $data['nilai']; ?>" min="0" max="100" required>

<br><br>

<input type="submit" value="Update">
<a href="daftar.php" class="btn">Kembali</a>

</form>

</div>

</body>
</html>
