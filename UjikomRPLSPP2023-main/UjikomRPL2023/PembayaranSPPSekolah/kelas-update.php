<?php
include "koneksi.php";

$id_kelas = $_POST['id_kelas'];
$nama_kelas = $_POST['nama_kelas'];
$wali_kelas = $_POST['wali_kelas'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];

$sql = "UPDATE tb_kelas SET nama_kelas = '$nama_kelas', wali_kelas = '$wali_kelas', kompetensi_keahlian = '$kompetensi_keahlian' WHERE id_kelas = '$id_kelas'";

mysqli_query($koneksi, $sql);

header("location: kelas.php");
