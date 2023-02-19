<?php
session_start();

$nisn = $_SESSION['nisn'];
include "koneksi.php";
$sql = "SELECT * FROM tb_siswa a INNER JOIN tb_kelas b ON a.id_kelas = b.id_kelas WHERE a.nisn = '$nisn' ORDER BY a.nisn";
$query = mysqli_query($koneksi, $sql);

$data = mysqli_fetch_array($query);
$nama = $data['nama'];
$nama_kelas = $data['nama_kelas'];

$judul = "LAPORAN HISTORI";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $judul; ?></title>
	<link rel="icon" href="assets/images/logo-smk.png">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="icon" href="assets/images/logo-smk.png">
</head>
<body>
	<div class="container">
		<h1 class="mt-5">Rekapitulasi Transaksi Pembayaran</h1>
		<p>
			NISN: <?= $nisn; ?><br>
			Nama: <?= $nama; ?><br>
			Kelas: <?= $nama_kelas; ?>
		</p>
		<table class="table table-hover">
			<tr>
				<th>No</th>
				<th>Tanggal Bayar</th>
				<th>Nama Bulan</th>
				<th class="text-center">Jumlah</th>
				<th>Nama Petugas</th>
			</tr>
			<?php
			$no = 1;
			$jumlah_bayar = 0;
			$sql = "SELECT * FROM tb_pembayaran a INNER JOIN tb_petugas b ON a.id_petugas = b.id_petugas WHERE a.nisn = '$nisn' ORDER BY a.tgl_bayar DESC";
			$query = mysqli_query($koneksi, $sql);
			while ($data = mysqli_fetch_array($query)){
				$jumlah_bayar = $jumlah_bayar + $data['jumlah_bayar'];
				$tgl_bayar = substr($data['tgl_bayar'], 8, 2).'-'.substr($data['tgl_bayar'], 5, 2).'-'.substr($data['tgl_bayar'], 0,4);

				$kd_bulan = $data['bulan_bayar'];
                if ($kd_bulan == '01'){$nama_bulan = "Januari";}
                elseif ($kd_bulan == '02'){$nama_bulan = "Februari";}
                elseif ($kd_bulan == '03'){$nama_bulan = "Maret";}
                elseif ($kd_bulan == '04'){$nama_bulan = "April";}
                elseif ($kd_bulan == '05'){$nama_bulan = "Mei";}
                elseif ($kd_bulan == '06'){$nama_bulan = "Juni";}
                elseif ($kd_bulan == '07'){$nama_bulan = "Juli";}
                elseif ($kd_bulan == '08'){$nama_bulan = "Agustus";}
                elseif ($kd_bulan == '09'){$nama_bulan = "September";}
                elseif ($kd_bulan == '10'){$nama_bulan = "Oktober";}
                elseif ($kd_bulan == '11'){$nama_bulan = "November";}
                elseif ($kd_bulan == '12'){$nama_bulan = "Desember";}
               	?>
               	<tr>
               		<td><?= $no++; ?></td>
               		<td><?= $tgl_bayar; ?></td>
               		<td><?= $nama_bulan; ?></td>
               		<td class="text-center"><?= number_format($data['jumlah_bayar']); ?></td>
               		<td><?= $data['nama_petugas'] ?></td>
               	</tr>
               	<?php
			}
			?>
			<tr>
				<td colspan="3" align="right">Jumlah</td>
				<td class="text-center"><?= number_format($jumlah_bayar); ?></td>
				<td></td>
			</tr>
		</table>
	</div>
</body>
</html>