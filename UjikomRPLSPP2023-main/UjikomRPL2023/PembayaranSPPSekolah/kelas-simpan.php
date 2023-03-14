<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'db_spp');

if (!$koneksi) {
    echo "<h1>Database tidak terhubung...</h1>";
    exit();
}

$nama_kelas = $_POST['nama_kelas'];
$wali_kelas = $_POST['wali_kelas'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];

$sql = "INSERT INTO tb_kelas(id_kelas, nama_kelas, wali_kelas, kompetensi_keahlian) VALUES (null, '$nama_kelas', '$wali_kelas', '$kompetensi_keahlian')";

mysqli_query($koneksi, $sql);

header("location: kelas.php");