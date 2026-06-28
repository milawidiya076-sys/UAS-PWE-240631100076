<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}

include "koneksi.php";

// Pencarian
$cari = "";
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $query = mysqli_query($conn,"SELECT * FROM tb_nilai
        WHERE nama LIKE '%$cari%'
        OR nim LIKE '%$cari%'
        OR mata_kuliah LIKE '%$cari%'
        ORDER BY id ASC");
}else{
    $query = mysqli_query($conn,"SELECT * FROM tb_nilai ORDER BY id ASC");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Daftar Data Nilai</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
    <h2>Sistem Data Nilai Mahasiswa</h2>

    <div class="nav-menu">
        <a href="index.php">Home</a>
        <a href="tambah.php">Tambah Data</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</div>

<div class="container">

<h1>Daftar Data Nilai</h1>

<div class="top-bar">

<form method="GET" class="search-box">

<input
type="text"
name="cari"
placeholder="Cari nama / NIM / Mata Kuliah..."
value="<?= $cari ?>">

<button type="submit">Cari</button>

</form>

</div>

<table>

<thead>

<tr>
<th>No</th>
<th>Nama</th>
<th>NIM</th>
<th>Mata Kuliah</th>
<th>Nilai</th>
<th>Grade</th>
<th>Aksi</th>
</tr>

</thead>

<tbody>

<?php
$no=1;

while($d=mysqli_fetch_array($query)){
?>

<tr>

<td><?= $no++ ?></td>
<td><?= $d['nama'] ?></td>
<td><?= $d['nim'] ?></td>
<td><?= $d['mata_kuliah'] ?></td>
<td><?= $d['nilai'] ?></td>
<td><?= $d['grade'] ?></td>

<td>
<a href="edit.php?id=<?= $d['id'] ?>">Edit</a> |
<a href="hapus.php?id=<?= $d['id'] ?>"
onclick="return confirm('Yakin ingin menghapus data?')">
Hapus
</a>
</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</body>
</html>
