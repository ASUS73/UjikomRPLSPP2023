<?php

include "koneksi.php";

session_start();
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];

$id_spp = $_GET['id_spp'];
$sql = "SELECT * FROM tb_spp WHERE id_spp = '$id_spp'";
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
    <title>SPP</title>
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
    <h1 class="mt-5">Edit SPP</h1>
    <form action="spp-update.php" method="post">
        <input type="hidden" name="id_spp" value="<?= $id_spp; ?>" class="form-control">
        <table>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><input type="text" name="tahun" id="" autofocus required autocomplete="off" placeholder="Masukan Tahun" value="<?= $data['tahun']; ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Nominal</td>
                <td>:</td>
                <td><input type="text" name="nominal" id="" autofocus required autocomplete="off" placeholder="Masukan Nominal" value="<?= $data['nominal']; ?>" class="form-control"></td>
            </tr>
            <tr>
                <td><br><input type="submit" value="Update" class="btn btn-success"> <a href="spp.php" class="btn btn-secondary">Cancel</a></td>
            </tr>
        </table>
    </form>    
</div>
</body>
</html>
