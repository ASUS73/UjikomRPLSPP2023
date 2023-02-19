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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
            <h1 class="mt-5">Rekaptulasi Petugas</h1>  
        </div>
        <a href="petugas-tambah.php" class="btn btn-success">+ Tambah Petugas</a>
        <br><br>
        <table border="1" width="100%" class="table table-hover">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Petugas</th>
                <th>Level</th>
                <th class="text-center">Aksi</th>
            </tr>
            <?php
            $no = 1;
            $sql = "CALL pPetugas1()";
            // $sql = "SELECT * FROM tb_petugas";
            $query = mysqli_query($koneksi, $sql);
            while ($data = mysqli_fetch_array($query)) {?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['username']; ?></td>
                    <td><?= $data['nama_petugas']; ?></td>
                    <td><?= $data['level']; ?></td>
                    <td class="text-center"><a href="petugas-edit.php?id_petugas=<?= $data['id_petugas']; ?>" class="btn btn-warning">Edit</a> <a href="petugas-hapus.php?id_petugas=<?= $data['id_petugas']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
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