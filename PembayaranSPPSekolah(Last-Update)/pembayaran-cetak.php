<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'db_spp');

if (!$koneksi) {
    echo "<h1>Database tidak terhubung...</h1>";
    exit();
}

session_start();

$level = $_SESSION['level'];
$nama = $_SESSION['nama'];


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CETAK PEMBAYARAN</title>
    <!--  Icon  -->
    <link rel="icon" href="assets/images/logo-smk.png">

    <!--  CSS Bootstrap  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--  CSS Optional  -->
    <style>
        @media print {
            #tombol {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2 class="text-center">Bukti Transaksi</h2>
            <!-- <img src="assets/images/logo-smk.png" width="100px"> -->
            <p class="text-center" style="font-size:25px;">SMK AL-IHSAN BATUJAJAR</p>
            <p class="text-center" style="padding-top: 0px;">
                Jl.Galanggang RT 02 RW 09 Desa Galanggang Kecamatan Batujajar Kabupaten Bandung Barat Telepon (022) 86006135
            </p>
        </div>
        <div class="card-body">
            <?php
            $id_pembayaran = $_GET['id_pembayaran'];
            $sql = "SELECT * FROM tb_pembayaran INNER JOIN tb_siswa ON tb_pembayaran.nisn = tb_siswa.nisn INNER JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas INNER JOIN tb_petugas ON tb_pembayaran.id_petugas = tb_petugas.id_petugas WHERE tb_pembayaran.id_pembayaran = '$id_pembayaran'";
            $query = mysqli_query($koneksi, $sql);
            $data = mysqli_fetch_array($query);
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
            ?>

            <table>
                <tr>
                    <td>NISN</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td><?= $data['nisn'];?></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td><?= $data['nama'];?></td>
                </tr>
                <tr>
                    <td>Tanggal Bayar</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td><?= $data['tgl_bayar'];?></td>
                </tr>
                <tr>
                    <td>Bulan</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td><?= $nama_bulan;?></td>
                </tr>
                <tr>
                    <td>Waktu Pembayaran</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td><?= $data['jam'];?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td><?= $data['nama_kelas'];?></td>
                </tr>
                <tr>
                    <td>Jumlah Bayar</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td>Rp. <?= $data['jumlah_bayar'];?></td>
                </tr>
                <br><br>
                <tr>
                    <td>Nama Petugas</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td><?= $data['nama_petugas'];?></td>
                </tr>
            </table>
            <br><br>
            <p style="font-size:12px;"><b>
                Catatan :<br>
                1. Uang SPP dibayar Paling lambat tanggal 10 setiap bulan (kecuali bulan juni)<br>
                2. Uang SPP dibayar selama 12 bulan (satu tahun ajaran)
            </b>
            </p>
            <div class="article">
                <h3 class="text-center">Terimakasih Telah melakukan pembayaran</h3>
            </div>
            <br><br>
            <div align="right">
                <div style="padding-right:50px;">
                    <p>Kepala Sekolah</p>
                    <br><br>
                    <br><br>
                </div>
                <p style="padding-right:25px; text-decoration:underline;">H.DEDI SOBANA,S.Pd</p>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" onclick="return(window.print())" id="tombol">Cetak Transaksi</button>
        </div>
    </div>
</div>
</body>
</html>
