<?php
include "koneksi.php";

$id_pembayaran = $_GET['id_pembayaran'];

$sql = "DELETE FROM tb_pembayaran WHERE id_pembayaran = '$id_pembayaran'";
mysqli_query($koneksi, $sql);
header('location: pembayaran.php');