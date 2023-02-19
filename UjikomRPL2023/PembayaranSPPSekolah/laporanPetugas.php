<?php

$judul = "LAPORAN-LAPORAN";

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
    <title>PETUGAS</title>
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
            <h1 class="mt-5">Laporan-laporan</h1>
            <!-- <form action="laporan-laporan.php" method="post" target="_blank"> -->
            <form action="laporan2Petugas.php" method="post">
                <!-- <select name="nolap" required>
                    <option value="">Pilih Laporan</option>
                    <option value="1">Laporan Petugas</option>
                    <option value="2">Laporan SPP</option>
                    <option value="3">Laporan Kelas</option>
                    <option value="4">Laporan Siswa</option>
                    <option value="5">Laporan Transaksi Pembayaran</option>
                </select> -->
                <input type="submit" name="nolap" value="Laporan Siswa" class="btn btn-success mt-5" required>
            </form> 
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer class="text-center" style="background-color: black;">
        <p class="text-white p-3">&copy; Copyright 2023 by D.E.Y.Y. Project</p>
    </footer>
</body>
</html>