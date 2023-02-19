<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'db_spp');

if (!$koneksi) {
    echo "<h1>Database tidak terhubung...</h1>";
    exit();
}

$nisn           = $_POST['nisn'];
$nama           = $_POST['nama'];
$id_kelas       = $_POST['id_kelas'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$alamat         = $_POST['alamat'];
$no_telp        = $_POST['no_telp'];
$id_spp         = $_POST['id_spp'];

$sql = "UPDATE tb_siswa SET nama = '$nama', id_kelas = '$id_kelas', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', no_telp = '$no_telp', id_spp = '$id_spp' WHERE nisn = '$nisn'";

mysqli_query($koneksi, $sql);

header("location: siswa.php");