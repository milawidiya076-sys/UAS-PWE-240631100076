<?php

// Function menentukan grade
function grade($nilai)
{
    if ($nilai >= 85) {
        return "A";
    } elseif ($nilai >= 75) {
        return "B";
    } elseif ($nilai >= 65) {
        return "C";
    } elseif ($nilai >= 50) {
        return "D";
    } else {
        return "E";
    }
}

// Function menghitung jumlah data
function jumlahData($conn)
{
    $query = mysqli_query($conn, "SELECT * FROM tb_nilai");
    return mysqli_num_rows($query);
}

// Function menampilkan semua data
function tampilData($conn)
{
    $query = mysqli_query($conn, "SELECT * FROM tb_nilai");
    return $query;
}

?>
