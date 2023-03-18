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
            <h1 class="mt-5">Rekaptulasi SPP</h1>        
        </div>
        <a href="spp-tambah.php" class="btn btn-success">+ Tambah SPP</a>
        <br><br>
        <table border="1" width="100%" class="table table-hover">
            <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Nominal</th>
                <th class="text-center">Aksi</th>
            </tr>
            <?php
            $no = 1;
            $sql = "SELECT * FROM tb_spp";
            $query = mysqli_query($koneksi, $sql);
            while ($data = mysqli_fetch_array($query)) {?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['tahun']; ?></td>
                    <td><?= number_format($data['nominal']); ?></td>
                    <td class="text-center"><a href="spp-edit.php?id_spp=<?= $data['id_spp']; ?>" class="btn btn-warning">Edit</a> <a href="spp-hapus.php?id_spp=<?= $data['id_spp']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
                </tr>
                <?php
            } ?>
        </table>
    </div>
    <footer class="text-center" style="position: fixed; right: 0; bottom: 0; left: 0; padding: 0px; background-color: black; color: white;">
        <p class="text-white p-3">&copy; Copyright 2023 by D.E.Y.Y. Project</p>
    </footer>
</body>
</html>