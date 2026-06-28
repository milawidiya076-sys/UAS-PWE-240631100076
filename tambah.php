<?php
<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}

include "koneksi.php";
?>

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $nilai = $_POST['nilai'];

    if($nilai >= 85){
        $grade = "A";
    }elseif($nilai >= 70){
        $grade = "B";
    }elseif($nilai >= 60){
        $grade = "C";
    }elseif($nilai >= 50){
        $grade = "D";
    }else{
        $grade = "E";
    }

    mysqli_query($conn,"INSERT INTO tb_nilai(nama,nim,mata_kuliah,nilai,grade)
    VALUES('$nama','$nim','$mata_kuliah','$nilai','$grade')");

    header("Location: daftar.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Nilai</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
    <h2>Sistem Data Nilai Mahasiswa</h2>
</div>

<div class="container">

<div class="card">

<h1>Tambah Data Nilai</h1>

<form method="POST">

<label>Nama Mahasiswa</label>
<input type="text" name="nama" required>

<label>NIM</label>
<input type="text" name="nim" required>

<label>Mata Kuliah</label>
<input type="text" name="mata_kuliah" required>

<label>Nilai</label>
<input type="number" name="nilai" min="0" max="100" required>

<br><br>

<input type="submit" name="simpan" value="Simpan">

<a href="daftar.php" class="btn biru">Kembali</a>

</form>

</div>

</div>

</body>
</html>
