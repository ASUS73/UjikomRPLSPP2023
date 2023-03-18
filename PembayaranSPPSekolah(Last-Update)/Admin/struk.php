<?php 
session_start();

include "../koneksi.php";

$sql = "SELECT * FROM tb_pembayaran INNER JOIN tb_siswa ON tb_pembayaran.nisn = tb_siswa.nisn INNER JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas INNER JOIN tb_petugas ON tb_pembayaran.id_petugas = tb_petugas.id_petugas";
$query = mysqli_query($koneksi, $sql);

$data = mysqli_fetch_array($query);
$nama = $data['nama'];
$kelas = $data['nama_kelas'];
$jurusan = $data['kompetensi_keahlian'];
$jumlah = $data['jumlah_bayar'];
$nisn = $data['nisn'];

?>
<html>
<head>
	<link rel="icon" href="../assets/images/logo-smk.png">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<title>Struk</title>
</head>
<body>
	<div class="container mt-5">
		<!-- <img src="../assets/images/logo-smk-removebg-preview.png"> -->
		<p>
			Nama: <?= $nama; ?><br>
			NISN: <?= $nisn; ?><br>
			Kelas: <?= $kelas; ?><br>
			Jurusan: <?= $jurusan; ?><br>
			Jumlah Bayar: Rp.<?= $jumlah; ?><br>
		</p>
		<!-- <p>Nama Siswa: </p>
		<p>NISN: </p>
		<p>Kelas: </p>
		<p>Bulan: </p>
		<p>Jumlah: </p>
		<p>Nama Petugas: </p>
		<p>Tanggal Bayar: </p> -->
	</div>
</body>
</html>