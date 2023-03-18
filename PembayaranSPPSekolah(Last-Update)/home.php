<?php
include "koneksi.php";
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
    <title>H O M E</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="icon" href="assets/images/logo-smk.png">
</head>
<body class="container-fluid">
  <!-- This is header-->
  <?php
  include "header.php";
  ?>
  <br>
  <div class="container">
    <div class="text-center">
      <h1 class="mt-5">Selamat Datang <?= $nama ?> <br> Di Aplikasi Pembayaran SPP</h1>
    </div>
  </div>
  <footer class="text-center" style="position: fixed; right: 0; bottom: 0; left: 0; padding: 0px; background-color: black; color: white;">
    <p class="text-white p-3">&copy; Copyright 2023 by D.E.Y.Y. Project</p>
  </footer>
</body>
</html>