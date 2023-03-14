<?php

include "koneksi.php";

session_start();
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];

$id_petugas = $_GET['id_petugas'];
$sql = "SELECT * FROM tb_petugas WHERE id_petugas = '$id_petugas'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$level = $data['level'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petugas</title>
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
    <h1 class="mt-5">Edit Data Petugas</h1>
    <form action="petugas-update.php" method="post">
        <input type="hidden" name="id_petugas" value="<?= $id_petugas; ?>">
        <table>
            <tr>
                <td>Nama Petugas</td>
                <td>:</td>
                <td><input type="text" name="nama_petugas" id="" autofocus required autocomplete="off" placeholder="Masukan Nama Petugas" value="<?= $data['nama_petugas']; ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" id="" autofocus required autocomplete="off" placeholder="Masukan Username" value="<?= $data['username']; ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" id="" autofocus required autocomplete="off" value="<?= $data['password']; ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>:</td>
                <td>
                    <select name="level" id="" required class="form-control">
                        <option value="admin" <?php if ($level == "admin"){echo "selected='selected'";}?>>Admin</option>
                        <option value="petugas" <?php if ($level == "petugas"){echo "selected='selected'";}?>>Petugas</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><br><input type="submit" value="Update" class="btn btn-success"> <a href="petugas.php" class="btn btn-secondary">Cancel</a></td>
            </tr>
        </table>
    </form>    
</div>
</body>
</html>
