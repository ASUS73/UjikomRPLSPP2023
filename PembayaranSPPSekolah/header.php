<ul class="text-center bg-secondary">
    <li><a href="home.php">H O M E</a></li>
    <?php
    if ($level == "admin") {?>
        <li><a href="petugas.php">Petugas</a></li>
        <li><a href="spp.php">SPP</a></li>
        <li><a href="kelas.php">Kelas</a></li>
        <li><a href="siswa.php">Siswa</a></li>
        <?php
    }
    if ($level == "petugas") {?>
        <li><a href="pembayaran.php">Pembayaran</a></li>
        <li><a href = "laporanPetugas.php">Laporan</a></li>
        <?php
    }
    if ($level == "siswa") {?>
        <li><a href="histori.php">Histori</a></li>
        <?php
    }
    if ($level == "admin") {?>
        <li><a href="pembayaran.php">Pembayaran</a></li>
        <li><a href = "laporan.php">Laporan</a></li>
        <?php
    }
    ?>
    <li><a href="logout.php">Logout</a></li>
</ul>