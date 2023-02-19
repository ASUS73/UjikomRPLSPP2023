<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'db_spp');

if (!$koneksi) {
    echo "<h1>Database tidak terhubung...</h1>";
    exit();
}

$nisn           = $_POST['nisn'];
$nis            = $_POST['nis'];
$nama           = $_POST['nama'];
$id_kelas       = $_POST['id_kelas'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$alamat         = $_POST['alamat'];
$no_telp        = $_POST['no_telp'];
$id_spp         = $_POST['id_spp'];

$sql = "INSERT INTO tb_siswa(nisn, nis, nama, id_kelas, jenis_kelamin, alamat, no_telp, id_spp) VALUES ('$nisn', '$nis', '$nama', '$id_kelas', '$jenis_kelamin', '$alamat', '$no_telp', '$id_spp')";

mysqli_query($koneksi, $sql);

header("location: siswa.php");