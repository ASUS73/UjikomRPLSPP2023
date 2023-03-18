<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'db_spp');

if (!$koneksi) {
    echo "<h1>Database tidak terhubung...</h1>";
    exit();
}

$id_spp = $_GET['id_spp'];

$sql = "DELETE FROM tb_spp WHERE id_spp = '$id_spp'";
mysqli_query($koneksi, $sql);

header("location: spp.php");
