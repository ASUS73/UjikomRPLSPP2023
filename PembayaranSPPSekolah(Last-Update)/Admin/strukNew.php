<?php
session_start();

include "../koneksi.php";

$nisn = $_SESSION['nisn'];
$sql = "SELECT * FROM tb_pembayaran INNER JOIN tb_siswa ON tb_pembayaran.nisn = tb_siswa.nisn INNER JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas INNER JOIN tb_petugas ON tb_pembayaran.id_petugas = tb_petugas.id_petugas INNER JOIN tb_siswa a INNER JOIN tb_kelas b ON a.id_kelas = b.id_kelas WHERE a.nisn = '$nisn' ORDER BY a.nisn";
$query = mysqli_query($koneksi, $sql);

// $query = mysqli_query($koneksi, $sql);
while ($data = mysqli_fetch_array($query)) {
  $tgl_bayar = substr($data['tgl_bayar'], 8, 2).'-'.substr($data['tgl_bayar'], 5, 2).'-'.substr($data['tgl_bayar'], 0,4);

  $kd_bulan = $data['bulan_bayar'];
  if ($kd_bulan == '01'){$nama_bulan = "Januari";}
  elseif ($kd_bulan == '02'){$nama_bulan = "Februari";}
  elseif ($kd_bulan == '03'){$nama_bulan = "Maret";}
  elseif ($kd_bulan == '04'){$nama_bulan = "April";}
  elseif ($kd_bulan == '05'){$nama_bulan = "Me ";}
  elseif ($kd_bulan == '06'){$nama_bulan = "Juni";}
  elseif ($kd_bulan == '07'){$nama_bulan = "Juli";}
  elseif ($kd_bulan == '08'){$nama_bulan = "Agustus";}
  elseif ($kd_bulan == '09'){$nama_bulan = "September";}
  elseif ($kd_bulan == '10'){$nama_bulan = "Oktober";}
  elseif ($kd_bulan == '11'){$nama_bulan = "November";}
  elseif ($kd_bulan == '12'){$nama_bulan = "Desember";}

  $nama = $data['nama'];
  $kelas = $data['nama_kelas'];
  $jurusan = $data['kompetensi_keahlian'];
  $jumlah = number_format($data['jumlah_bayar']);
  $nisn = $data['nisn'];
  $tanggal = $data['tgl_bayar'];
  $IdBayar = $data['id_pembayaran'];
  $nama_petugas = $data['nama_petugas'];
  $jam = $data['jam'];
  $total = $data['total_bayar'];

}

// $data = mysqli_fetch_array($query);


?>
<html>
<head>
	<link rel="icon" href="../assets/images/logo-smk.png">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<title>Struk</title>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

:root {
  --primary-color: #f5826e;  
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Roboto', sans-serif;
  letter-spacing: 0.5px;
}

body {
  background-color: var(--primary-color);
}

.invoice-card {
  display: flex;
  flex-direction: column;
  position: absolute;
  padding: 10px 2em;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  min-height: 25em;
  width: 22em;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0px 10px 30px 5px rgba(0, 0, 0, 0.15);
}

.invoice-card > div {
  margin: 5px 0;
}

.invoice-title {
  flex: 3;
}

.invoice-title #date {
  display: block;
  margin: 8px 0;
  font-size: 12px;
}

.invoice-title #main-title {
  display: flex;
  justify-content: space-between;
  margin-top: 2em;
}

.invoice-title #main-title h4 {
  letter-spacing: 2.5px;
}

.invoice-title span {
  color: rgba(0, 0, 0, 0.4);
}

.invoice-details {
  flex: 1;
  border-top: 0.5px dashed grey;
  border-bottom: 0.5px dashed grey;
  display: flex;
  align-items: center;
}

.invoice-table {
  width: 100%;
  border-collapse: collapse;
}

.invoice-table thead tr td {
  font-size: 12px;
  letter-spacing: 1px;
  color: grey;
  padding: 8px 0;
}

.invoice-table thead tr td:nth-last-child(1),
.row-data td:nth-last-child(1),
.calc-row td:nth-last-child(1)
{
  text-align: right;
}

.invoice-table tbody tr td {
    padding: 8px 0;
    letter-spacing: 0;
}

.invoice-table .row-data #unit {
  text-align: center;
}

.invoice-table .row-data span {
  font-size: 13px;
  color: rgba(0, 0, 0, 0.6);
}

.invoice-footer {
  flex: 1;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.invoice-footer #later {
  margin-right: 5px;
}

.btn {
  border: none;
  padding: 5px 0px;
  background: none;
  cursor: pointer;
  letter-spacing: 1px;
  outline: none;
}

.btn.btn-secondary {
  color: rgba(0, 0, 0, 0.3);
}

.btn.btn-primary {
  color: var(--primary-color);
}

.btn#later {
  margin-right: 2em;
}

#waktu{
  display: block;
  margin-left: 8px 0;
  font-size: 12px;
}

	</style>
</head>
<body>
	<div class="invoice-card">
	  	<div class="invoice-title">
	    	<div id="main-title">
	      	<h4>Bukti Pembayaran SPP</h4>
	    	  <span>#<?= $IdBayar; ?></span>
		    </div>
    
    		<span id="date"><?= $tanggal; ?></span>
        <span id="waktu">Waktu:<?= $jam; ?> </span>
  		</div>
  
		<div class="invoice-details">
			<table class="invoice-table">
				<thead>
			        <!-- <tr>
			          <td>PRODUCT</td>
			          <td>UNIT</td>
			          <td>PRICE</td>
			        </tr> -->
		    	</thead>
		      
			    <tbody>
            <tr class="row-data">
                <td>NISN</td>
                <td id="unit"></td>
                <td><span><?= $nisn; ?></span></td>
            </tr>
            <tr class="row-data">
              <td>Nama</td>
              <td id="unit"></td>
              <td><span><?= $nama; ?></span></td>
            </tr>
            <tr class="row-data">
                <td>Kelas</td>
                <td id="unit"></td>
                <td><span><?= $kelas; ?></span></td>
            </tr>
            <tr class="row-data">
                <td>Petugas</td>
                <td id="unit"></td>
                <td><span><?= $nama_petugas; ?></span></td>
            </tr>
            <tr class="row-data">
                <td>Bulan</td>
                <td id="unit"></td>
                <td><span><?= $nama_bulan; ?></span></td>
            </tr>
            <tr class="row-data">
                <td>Jumlah SPP</td>
                <td id="unit"></td>
                <td><span>Rp.<?= $jumlah; ?></span></td>
            </tr>


            <tr class="calc-row">
              <td colspan="2">Total Bayar</td>
			        <td>RP.<?= $total; ?></td>
			      </tr>
			    </tbody>
			</table>
		</div>
  
		<div class="invoice-footer">
			<h4 class="text-center">Terimakasih Sudah Melakukan Pembayaran</h4>
		</div>
	</div>
</body>
</html>