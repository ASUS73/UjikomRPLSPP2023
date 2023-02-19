<?php
include 'koneksi.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan</title>
    <link rel="icon" href="assets/images/logo-smk.png">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <style type="text/css">
        @media print{
            #tombol{
                display: none;
            }
        }
    </style>
</head>
<!-- <body class="text-center" onload="window.print()"> -->
<body class="text-center">
    <?php
    $nolap = $_POST['nolap'];
    if ($nolap=='1') {?>
        <div class="container">
        <h1 align="center" class="mt-3">Rekapitulasi Petugas</h1>
        <table class="table table-hover mt-5" border="1" width="100%">
            <tr height="40">
                <th>No.</th>
                <th>Username</th>
                <th>Nama Petugas</th>
                <th>Level</th>
            </tr>
            <?php
            $no = 1;
            $sql = "SELECT * FROM tb_petugas";
            $query = mysqli_query($koneksi, $sql);
            while ($data = mysqli_fetch_array($query)) {?>
                <tr>
                    <td align="center"><?= $no++; ?>.</td>
                    <td align="center"><?= $data['username']; ?></td>
                    <td align="center"><?= $data['nama_petugas']; ?></td>
                    <td align="center"><?= $data['level']; ?></td>
                </tr>
                <?php
            }
            ?>
        </div>
        </table>
        <input type="submit" value="Print" class="btn btn-success" onclick="return(window.print())" id="tombol">
        <?php   
    }elseif ($nolap=='2') {?>
        <div class="container">
        <h1 align="center" class="mt-3">Rekapitulasi SPP</h1>
        <table class="table table-hover mt-5" border="1" width="100%">
            <tr height="40">
                <th>No.</th>
                <th>Tahun</th>
                <th>Nominal</th>
            </tr>
            <?php
            $no = 1;
            $sql = "SELECT * FROM tb_spp";
            $query = mysqli_query($koneksi, $sql);
            while ($data = mysqli_fetch_array($query)) {?>
                <tr>
                    <td align="center"><?= $no++; ?>.</td>
                    <td align="center"><?= $data['tahun']; ?></td>
                    <td align="center"><?= number_format($data['nominal']); ?></td>
                </tr>
                <?php
            }
            ?>
        </div>
        </table>
        <input type="submit" value="Print" class="btn btn-success" onclick="return(window.print())" id="tombol">
        <?php
    }elseif ($nolap=='3') {?>
        <div class="container">
        <h1 align="center" class="mt-3">Rekapitulasi Kelas</h1>
        <table class="table table-hover mt-5" border="1" width="100%">
            <tr height="40">
                <th>No.</th>
                <th>Nama Kelas</th>
                <th>Wali Kelas</th>
                <th>Kompetensi Keahlian</th>
            </tr>
            <?php
            $no = 1;
            $sql = "SELECT * FROM tb_kelas";
            $query = mysqli_query($koneksi, $sql);
            while ($data = mysqli_fetch_array($query)) {?>
                <tr>
                    <td align="center"><?= $no++; ?>.</td>
                    <td align="center"><?= $data['nama_kelas']; ?></td>
                    <td align="center"><?= $data['wali_kelas']; ?></td>
                    <td align="center"><?= $data['kompetensi_keahlian']; ?></td>
                </tr>
                <?php
            }
            ?>
        </div>
        </table>
        <input type="submit" value="Print" class="btn btn-success" onclick="return(window.print())" id="tombol">
        <?php
    }elseif ($nolap=='4') {?>
        <div class="container">
        <h1 align="center" class="mt-3">Rekapitulasi Siswa</h1>
        <table class="table table-hover mt-5" border="1" width="100%">
            <tr height="40">
                <th>No.</th>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No.Telp</th>
            </tr>
            <?php
            $no = 1;
            $sql = "SELECT * FROM tb_siswa a INNER JOIN tb_kelas b ON a.id_kelas=b.id_kelas";
            $query = mysqli_query($koneksi, $sql);
            while ($data = mysqli_fetch_array($query)) {?>
                <tr>
                    <td align="center"><?= $no++; ?>.</td>
                    <td align="center"><?= $data['nisn']; ?></td>
                    <td align="center"><?= $data['nis']; ?></td>
                    <td align="center"><?= $data['nama']; ?></td>
                    <td align="center"><?= $data['nama_kelas']; ?></td>
                    <td align="center"><?= $data['jenis_kelamin']; ?></td>
                    <td align="center"><?= $data['alamat']; ?></td>
                    <td align="center"><?= $data['no_telp']; ?></td>
                    <!-- <td><?= $data['id_spp']; ?></td> -->
                </tr>
                <?php
            }
            ?>
        </div>
        </table>
        <input type="submit" value="Print" class="btn btn-success" onclick="return(window.print())" id="tombol">
        <?php
    }elseif ($nolap=='5') {?>
        <div class="container">
        <h1 align="center" class="mt-3">Rekapitulasi Pembayaran</h1>
        <table class="table table-hover mt-5" border="1" width="100%">
            <tr>
            <th>No</th>
            <th>Tanggal Bayar</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Bulan</th>
            <th>Jumlah</th>
            <th>Nama Petugas</th>
        </tr>
        <?php
        $no = 1;
        $sql = "SELECT * FROM tb_pembayaran INNER JOIN tb_siswa ON tb_pembayaran.nisn = tb_siswa.nisn INNER JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas INNER JOIN tb_petugas ON tb_pembayaran.id_petugas = tb_petugas.id_petugas ORDER BY tb_pembayaran.tgl_bayar DESC";
        $query = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($query)) {
            $tgl_bayar = substr($data['tgl_bayar'], 8, 2).'-'.substr($data['tgl_bayar'], 5, 2).'-'.substr($data['tgl_bayar'], 0,4);

            $kd_bulan = $data['bulan_bayar'];
            if ($kd_bulan == '01'){$nama_bulan = "Januari";}
            elseif ($kd_bulan == '02'){$nama_bulan = "Februari";}
            elseif ($kd_bulan == '03'){$nama_bulan = "Maret";}
            elseif ($kd_bulan == '04'){$nama_bulan = "April";}
            elseif ($kd_bulan == '05'){$nama_bulan = "Me ";}
            elseif ($kd_bulan == '06'){$nama_bulan = "Juni";}
            elseif ($kd_bulan == '07'){$nama_bulan = "Juli";}
            elseif ($kd_bulan == '08'){$nama_bulan = "Agustus";}
            elseif ($kd_bulan == '09'){$nama_bulan = "September";}
            elseif ($kd_bulan == '10'){$nama_bulan = "Oktober";}
            elseif ($kd_bulan == '11'){$nama_bulan = "November";}
            elseif ($kd_bulan == '12'){$nama_bulan = "Desember";}
            ?>
            <tr>
                <td align="center"><?= $no++; ?></td>
                <td align="center"><?= $tgl_bayar; ?></td>
                <td align="center"><?= $data['nisn']; ?></td>
                <td align="center"><?= $data['nama']; ?></td>
                <td align="center"><?= $data['nama_kelas']; ?></td>
                <td align="center"><?= $nama_bulan; ?></td>
                <td align="right"><?= number_format($data['jumlah_bayar']); ?></td>
                <td><?= $data['nama_petugas']; ?></td>
            </tr>
        <?php
    } ?>
    </div>
    </table>
    <input type="submit" value="Print" class="btn btn-success" onclick="return(window.print())" id="tombol">
        <?php
    }?>
</body>
</html>