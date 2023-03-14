<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'db_spp');

if (!$koneksi) {
    echo "<h1>Database tidak terhubung...</h1>";
    exit();
}

$id_petugas = $_GET['id_petugas'];

$sql = "DELETE FROM tb_petugas WHERE id_petugas = '$id_petugas'";
mysqli_query($koneksi, $sql);

header("location: petugas.php");
