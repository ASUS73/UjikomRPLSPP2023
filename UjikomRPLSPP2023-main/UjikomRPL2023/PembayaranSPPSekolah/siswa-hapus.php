<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'db_spp');

if (!$koneksi) {
    echo "<h1>Database tidak terhubung...</h1>";
    exit();
}

$nisn = $_GET['nisn'];

$sql = "DELETE FROM tb_siswa WHERE nisn = '$nisn'";
mysqli_query($koneksi, $sql);

header("location: siswa.php");
