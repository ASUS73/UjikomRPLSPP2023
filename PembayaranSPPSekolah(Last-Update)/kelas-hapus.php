<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'db_spp');

if (!$koneksi) {
    echo "<h1>Database tidak terhubung...</h1>";
    exit();
}

$id_kelas = $_GET['id_kelas'];

$sql = "DELETE FROM tb_kelas WHERE id_kelas = '$id_kelas'";
mysqli_query($koneksi, $sql);

header("location: kelas.php");
