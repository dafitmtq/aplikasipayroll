<?php
$current = basename($_SERVER['PHP_SELF']);
?>

<nav class="nav">
    <ul>
        <li><a href="index.php?route=dashboard" class="<?= $current == 'dashboard' ? 'active' : '' ?>">Dashboard</a></li>
        <li><a href="index.php?route=perusahaan" class="<?= $current == 'perusahaan' ? 'active' : '' ?>">Perusahaan</a></li>
        <li><a href="index.php?route=karyawan" class="<?= $current == 'karyawan' ? 'active' : '' ?>">Karyawan</a></li>
        <li><a href="index.php?route=keteranganGaji" class="<?= $current == 'keteranganGaji' ? 'active' : '' ?>">Keterangan Gaji</a></li>
        <li><a href="index.php?route=slipGaji" class="<?= $current == 'slipGaji' ? 'active' : '' ?>">Slip Gaji</a></li>
        <li><a href="index.php?route=inputDetailGaji" class="<?= $current == 'inputDetailGaji' ? 'active' : '' ?>">Input Detail Gaji</a></li>
        <li><a href="index.php?route=laporanGaji" class="<?= $current == 'laporanGaji' ? 'active' : '' ?>">Laporan Gaji</a></li>
    </ul>
</nav>
