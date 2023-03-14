<?php
include "koneksi.php";
session_start();

$level = $_SESSION['level'];
$nama = $_SESSION['nama'];

$id_pembayaran = $_GET['id_pembayaran'];
$sql = "SELECT * FROM tb_pembayaran INNER JOIN tb_siswa ON tb_pembayaran.nisn = tb_siswa.nisn INNER JOIN tb_kelas on tb_siswa.id_kelas = tb_kelas.id_kelas INNER JOIN tb_spp ON tb_pembayaran.id_spp = tb_spp.id_spp WHERE tb_pembayaran.id_pembayaran = '$id_pembayaran'";

$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);

$tgl = $data['tgl_bayar'];
$id_spp = $data['id_spp'];
$bulan_bayar = $data['bulan_bayar'];

$nama = $data['nama'];
$nama_kelas = $data['nama_kelas'];
$nominal = $data['nominal'];

//$tgl = date('Y-m-d');


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
    <h1 class="mt-5">Edit Transaksi Pembayaran</h1>
    <form action="pembayaran-update.php" method="post">
        <input type="hidden" name="id_pembayaran" value="<?= $id_pembayaran; ?>">
        <table>
            <tr>
                <td>Tanggal Bayar</td>
                <td>:</td>
                <td><input type="date" name="tgl_bayar" value="<?= $tgl; ?>" autofocus required class="form-control"></td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td>:</td>
                <td><input type="text" value="<?= $nama; ?>" readonly class="form-control"></td>
            </tr>
            <tr>
                <td>Nama Kelas</td>
                <td>:</td>
                <td><input type="text" value="<?= $nama_kelas; ?>" readonly class="form-control"></td>
            </tr>
            <tr>
                <td>Jumlah Bayar</td>
                <td>:</td>
                <td><input type="text" value="<?= number_format($nominal); ?>" readonly class="form-control"></td>
            </tr>
            <tr>
                <td>Bulan Bayar</td>
                <td>:</td>
                <td>
                    <select name="bulan_bayar" id="" required class="form-control">
                        <option value="01" <?php if ($bulan_bayar == "01"){echo "selected=selected";}?> >Januari</option>
                        <option value="02" <?php if ($bulan_bayar == "02"){echo "selected=selected";}?> >Februari</option>
                        <option value="03" <?php if ($bulan_bayar == "03"){echo "selected=selected";}?> >Maret</option>
                        <option value="04" <?php if ($bulan_bayar == "04"){echo "selected=selected";}?> >April</option>
                        <option value="05" <?php if ($bulan_bayar == "05"){echo "selected=selected";}?> >Mei</option>
                        <option value="06" <?php if ($bulan_bayar == "06"){echo "selected=selected";}?> >Juni</option>
                        <option value="07" <?php if ($bulan_bayar == "07"){echo "selected=selected";}?> >Juli</option>
                        <option value="08" <?php if ($bulan_bayar == "08"){echo "selected=selected";}?> >Agustus</option>
                        <option value="09" <?php if ($bulan_bayar == "09"){echo "selected=selected";}?> >September</option>
                        <option value="10" <?php if ($bulan_bayar == "10"){echo "selected=selected";}?> >Oktober</option>
                        <option value="11" <?php if ($bulan_bayar == "11"){echo "selected=selected";}?> >November</option>
                        <option value="12" <?php if ($bulan_bayar == "12"){echo "selected=selected";}?> >Desember</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><br><input type="submit" value="Update" class="btn btn-success"> <a href="pembayaran.php" class="btn btn-secondary">Cancel</a></td>
            </tr>
        </table>
    </form>
</div>
<footer class="text-center" style="position: fixed; right: 0; bottom: 0; left: 0; padding: 0px; background-color: black; color: white;">
    <p class="text-white p-3">&copy; Copyright 2023 by D.E.Y.Y. Project</p>
</footer>
</body>
</html>