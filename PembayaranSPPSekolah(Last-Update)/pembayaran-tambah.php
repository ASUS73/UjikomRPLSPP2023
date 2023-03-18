<?php
include "koneksi.php";
session_start();

$level = $_SESSION['level'];
$nama = $_SESSION['nama'];

$tgl = date('Y-m-d');


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
    <h1 class="mt-5">Input Transaksi Pembayaran</h1>
    <form action="pembayaran-simpan.php" method="post">
        <table>
            <tr>
                <td>Tanggal Bayar</td>
                <td>:</td>
                <td><input type="date" name="tgl_bayar" value="<?= $tgl; ?>" autofocus required class="form-control" ></td>
            </tr>
            <tr>
                <td>Waktu Pembayaran</td>
                <td>:</td>
                <td><input type="time" name="jam" autofocus required class="form-control" ></td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td>:</td>
                <td>
                    <select name="nisn" id="" required class="form-control">
                        <option value="">~ Pilih Nama Siswa ~</option>
                        <?php
                        $sql = "SELECT * FROM tb_siswa INNER JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas ORDER BY tb_kelas.nama_kelas, tb_siswa.nama";
                        $query = mysqli_query($koneksi, $sql);
                        while ($data = mysqli_fetch_array($query)) {?>
                            <option value="<?= $data['nisn'];?>"><?= $data['nama'].' - '.$data['nama_kelas']; ?></option>
                            <?php
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Bulan Bayar</td>
                <td>:</td>
                <td>
                    <select name="bulan_bayar" id="" required class="form-control">
                        <option value="">~ Pilih Nama Bulan ~</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><br><input type="submit" value="Simpan" class="btn btn-success"> <a href="pembayaran.php" class="btn btn-secondary">Cancel</a></td>
            </tr>
        </table>
    </form>    
</div>
<footer class="text-center" style="position: fixed; right: 0; bottom: 0; left: 0; padding: 0px; background-color: black; color: white;">
    <p class="text-white p-3">&copy; Copyright 2023 by D.E.Y.Y. Project</p>
</footer>
</body>
</html>