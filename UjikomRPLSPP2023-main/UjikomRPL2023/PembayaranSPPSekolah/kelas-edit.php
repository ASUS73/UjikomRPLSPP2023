<?php

include "koneksi.php";

session_start();

$level = $_SESSION['level'];
$nama = $_SESSION['nama'];

$id_kelas = $_GET['id_kelas'];
$sql = "SELECT * FROM tb_kelas WHERE id_kelas = '$id_kelas'";
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
    <title>Kelas</title>
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
    <h1 class="mt-5">Edit Data Kelas</h1>
    <form action="kelas-update.php" method="post">
        <input type="hidden" name="id_kelas" value="<?= $id_kelas; ?>">
        <table>
            <tr>
                <td>Nama Kelas</td>
                <td>:</td>
                <td><input type="text" name="nama_kelas" id="" autofocus required autocomplete="off" placeholder="Masukan Nama Kelas" value="<?= $data['nama_kelas']; ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Wali Kelas</td>
                <td>:</td>
                <td><input type="text" name="wali_kelas" id="" autofocus required autocomplete="off" placeholder="Masukan Wali Kelas" value="<?= $data['wali_kelas']; ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Kompetensi Keahlian</td>
                <td>:</td>
                <td><input type="text" name="kompetensi_keahlian" id="" autofocus required autocomplete="off" placeholder="Masukan kompetensi keahlian" value="<?= $data['kompetensi_keahlian']; ?>" class="form-control"></td>
            </tr>
            <tr>
                <td><br><input type="submit" value="Update" class="btn btn-success"> <a href="kelas.php" class="btn btn-secondary">Cancel</a></td>
            </tr>
        </table>
    </form>    
</div>
</body>
</html>
