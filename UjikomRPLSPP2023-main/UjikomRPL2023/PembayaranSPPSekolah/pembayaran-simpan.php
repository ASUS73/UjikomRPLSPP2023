<?php
session_start();
include "koneksi.php";

$id_petugas     = $_SESSION['id_petugas'];
$tgl_bayar      = $_POST['tgl_bayar'];
$nisn           = $_POST['nisn'];
$bulan_bayar    = $_POST['bulan_bayar'];

$sql1 = "SELECT * FROM tb_siswa INNER JOIN tb_spp ON tb_siswa.id_spp = tb_spp.id_spp WHERE tb_siswa.nisn ='$nisn'";
$query1 = mysqli_query($koneksi, $sql1);
$data = mysqli_fetch_array($query1);
$id_spp = $data['id_spp'];
$jumlah_bayar = $data['nominal'];

$sql = "INSERT INTO tb_pembayaran (id_pembayaran, id_petugas, nisn, tgl_bayar, bulan_bayar, jumlah_bayar, id_spp) VALUES (null, '$id_petugas', '$nisn', '$tgl_bayar', '$bulan_bayar', '$jumlah_bayar', '$id_spp')";

mysqli_query($koneksi, $sql);

header("location: pembayaran.php");