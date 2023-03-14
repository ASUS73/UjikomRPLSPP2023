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
    <title>Pembayaran</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="icon" href="assets/images/logo-smk.png">
</head>
<body class="container-fluid">
    <!-- This is Header -->
    <?php
    include "header.php";
    ?>
    <br>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">Rekaptulasi Transaksi Pembayaran</h1>            
        </div>
        <a href="pembayaran-tambah.php" class="btn btn-success">+ Tambah Pembayaran</a>
        <br><br>
        <table border="1" width="100%" class="table table-hover">
            <tr>
                <th>No</th>
                <th>Tanggal Bayar</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Nama Bulan</th>
                <th>Jumlah</th>
                <th>Nama Petugas</th>
                <th class="text-center">Aksi</th>
            </tr>
            <?php
            $no = 1;
            $sql = "SELECT * FROM tb_pembayaran INNER JOIN tb_siswa ON tb_pembayaran.nisn = tb_siswa.nisn INNER JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas INNER JOIN tb_petugas ON tb_pembayaran.id_petugas = tb_petugas.id_petugas ORDER BY tb_pembayaran.tgl_bayar DESC";
            $query = mysqli_query($koneksi, $sql);
            while ($data = mysqli_fetch_array($query)) {
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
                    <td><?= $data['nisn']; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['nama_kelas']; ?></td>
                    <td><?= $nama_bulan; ?></td>
                    <td><?= number_format($data['jumlah_bayar']); ?></td>
                    <td><?= $data['nama_petugas']; ?></td>
                    <td class="text-center"><a href="pembayaran-edit.php?id_pembayaran=<?= $data['id_pembayaran']; ?>" class="btn btn-warning">Edit</a> <a href="pembayaran-hapus.php?id_pembayaran=<?= $data['id_pembayaran']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
                </tr>
                <?php
            } ?>
        </table>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer class="text-center" style="background-color: black;">
        <p class="text-white p-3">&copy; Copyright 2023 by D.E.Y.Y. Project</p>
    </footer>
</body>
</html>