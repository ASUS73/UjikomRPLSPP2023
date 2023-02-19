<?php

include "koneksi.php";

session_start();
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];

$nisn = $_GET['nisn'];
$sql = "SELECT * FROM tb_siswa WHERE nisn = '$nisn'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);

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
    <h1 class="mt-5">Edit Data Siswa</h1>
    <form action="siswa-update.php" method="post">
        <?php
        $nisn = $_GET['nisn'];
        $sql = "SELECT * FROM tb_siswa WHERE nisn = '$nisn'";
        $query = mysqli_query($koneksi, $sql);
        $data = mysqli_fetch_array($query);
        $id_kelas = $data['id_kelas'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $id_spp = $data['id_spp'];
        $alamat = $data['alamat'];
        $no_telp = $data['no_telp'];
        ?>
        <input type="hidden" name="nisn" value="<?= $nisn; ?>">
        <table>
            <tr>
                <td>Nama Siswa</td>
                <td>:</td>
                <td><input type="text" name="nama" id="" autofocus required autocomplete="off" placeholder="Masukan Nama" value="<?= $data['nama']; ?>" class="form-control"></td>
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
                            <option value="<?= $data['id_kelas'];?>" <?php if ($data['id_kelas'] == $id_kelas) { echo 'selected="selected"';}?>><?= $data['nama_kelas']; ?></option>
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
                        <option value="Laki-Laki" <?php if ($level == "Laki-Laki"){echo "selected='selected'";}?>>Laki-Laki</option>
                        <option value="Perempuan" <?php if ($level == "Perempuan"){echo "selected='selected'";}?>>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ALamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" id="" autofocus required autocomplete="off" placeholder="Masukan Alamat Siswa" value="<?= $alamat; ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>:</td>
                <td><input type="text" name="no_telp" id="" autofocus required autocomplete="off" placeholder="Masukan NO Telp/WA Siswa" value="<?= $no_telp; ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    <select name="id_spp" id="" required class="form-control">
                        <option value="">~ Pilih Kelas ~</option>
                        <?php
                        $sql = "SELECT * FROM tb_spp ORDER BY tahun";
                        $query = mysqli_query($koneksi, $sql);
                        while ($data = mysqli_fetch_array($query)) {?>
                            <option value="<?= $data['id_spp'];?>" <?php if ($data['id_spp'] == $id_spp) { echo 'selected="selected"';}?>><?= $data['tahun']; ?></option>
                            <?php
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><br><input type="submit" value="Update" class="btn btn-success"> <a href="siswa.php" class="btn btn-secondary">Cancel</a></td>
            </tr>
        </table>
    </form>    
</div>
</body>
</html>
