<?php
session_start();
include "koneksi.php";

$id_petugas     = $_SESSION['id_petugas'];
$id_pembayaran  = $_POST['id_pembayaran'];
$tgl_bayar      = $_POST['tgl_bayar'];
$bulan_bayar    = $_POST['bulan_bayar'];

$sql = "UPDATE tb_pembayaran SET tgl_bayar = '$tgl_bayar', bulan_bayar = '$bulan_bayar', id_petugas = '$id_petugas' WHERE id_pembayaran = '$id_pembayaran'";

mysqli_query($koneksi, $sql);

header("location: pembayaran.php");
