<?php
include "koneksi.php";

$id_petugas = $_POST['id_petugas'];
$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$sql = "UPDATE tb_petugas SET nama_petugas = '$nama_petugas', username = '$username', password = '$password', level = '$level' WHERE id_petugas = '$id_petugas'";

mysqli_query($koneksi, $sql);

header("location: petugas.php");
