<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'db_spp');

if (!$koneksi) {
    echo "<h1>Database tidak terhubung...</h1>";
    exit();
}

$tahun = $_POST['tahun'];
$nominal = $_POST['nominal'];

$sql = "INSERT INTO tb_spp (id_spp, tahun, nominal) VALUES (null, '$tahun', '$nominal')";

mysqli_query($koneksi, $sql);

header("location: spp.php");