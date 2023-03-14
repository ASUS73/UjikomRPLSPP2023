<?php
include "koneksi.php";

$id_spp = $_POST['id_spp'];
$tahun = $_POST['tahun'];
$nominal = $_POST['nominal'];

$sql = "UPDATE tb_spp SET tahun = '$tahun', nominal = '$nominal' WHERE id_spp = '$id_spp'";

mysqli_query($koneksi, $sql);

header("location: spp.php");
