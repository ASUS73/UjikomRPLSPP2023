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
<body>
<!-- This is Header -->
<?php
include "header.php";
?>
<br>
<div class="container">
    <h1 class="mt-5">Input Siswa</h1>
    <form action="siswa-simpan.php" method="post">
        <table>
            <tr>
                <td>NISN</td>
                <td>:</td>
                <td><input type="text" name="nisn" id="" autofocus required autocomplete="off" placeholder="Masukan NISN Siswa" class="form-control"></td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><input type="text" name="nis" id="" autofocus required autocomplete="off" placeholder="Masukan NIS Siswa" class="form-control"></td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td>:</td>
                <td><input type="text" name="nama" id="" autofocus required autocomplete="off" placeholder="Masukan Nama Siswa" class="form-control"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    <select name="id_kelas" id="" required class="form-control">
                        <option value="">~ Pilih Kelas ~</option>
                        <?php
                        $sql = "SELECT * FROM tb_kelas ORDER BY nama_kelas";
                        $query = mysqli_query($koneksi, $sql);
                        while ($data = mysqli_fetch_array($query)) {?>
                            <option value="<?= $data['id_kelas'];?>"><?= $data['nama_kelas']; ?></option>
                            <?php
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <select name="jenis_kelamin" id="" required class="form-control">
                        <option value="">~ Jenis Kelamin ~</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ALamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" id="" autofocus required autocomplete="off" placeholder="Masukan Alamat Siswa" class="form-control"></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>:</td>
                <td><input type="text" name="no_telp" id="" autofocus required autocomplete="off" placeholder="Masukan NO Telp/WA Siswa" class="form-control"></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td>
                    <select name="id_spp" id="" required class="form-control">
                        <option value="">~ Pilih Tahun ~</option>
                        <?php
                        $sql = "SELECT * FROM tb_spp ORDER BY tahun";
                        $query = mysqli_query($koneksi, $sql);
                        while ($data = mysqli_fetch_array($query)) {?>
                            <option value="<?= $data['id_spp'];?>"><?= $data['tahun']?></option>
                            <?php
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><br><input type="submit" value="Simpan" class="btn btn-success"> <a href="siswa.php" class="btn btn-secondary">Cancel</a></td>
            </tr>
        </table>
    </form>    
</div>
<footer class="text-center" style="position: fixed; right: 0; bottom: 0; left: 0; padding: 0px; background-color: black; color: white;">
    <p class="text-white p-3">&copy; Copyright 2023 by D.E.Y.Y. Project</p>
</footer>
</body>
</html>