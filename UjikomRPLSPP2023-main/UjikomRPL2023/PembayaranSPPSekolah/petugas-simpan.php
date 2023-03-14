<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'db_spp');

if (!$koneksi) {
    echo "<h1>Database tidak terhubung...</h1>";
    exit();
}

$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$sql = "INSERT INTO tb_petugas(id_petugas, username, password, nama_petugas, level) VALUES (null, '$username', '$password', '$nama_petugas', '$level')";

mysqli_query($koneksi, $sql);

header("location: petugas.php");