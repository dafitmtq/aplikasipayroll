<?php
$current = basename($_SERVER['PHP_SELF']);
?>
<nav class="nav">
    <ul>
        <li><a href="../dashboard.php" class="<?= $current == 'dashboard.php' ? 'active' : '' ?>">Dashboard</a></li>
        <li><a href="../perusahaan/perusahaan.php" class="<?= $current == 'perusahaan.php' ? 'active' : '' ?>">Perusahaan</a></li>
        <li><a href="../karyawan/karyawan.php" class="<?= $current == 'karyawan.php' ? 'active' : '' ?>">Karyawan</a></li>
        <li><a href="../keterangan_gaji/keterangan_gaji.php" class="<?= $current == 'keterangan_gaji.php' ? 'active' : '' ?>">Keterangan Gaji</a></li>
        <li><a href="../slip_gaji/slip_gaji.php" class="<?= $current == 'slip_gaji.php' ? 'active' : '' ?>">Slip Gaji</a></li>
        <li><a href="../input_detail_gaji/input_detail_gaji.php" class="<?= $current == 'input_detail_gaji.php' ? 'active' : '' ?>">Input Detail Gaji</a></li>
        <li><a href="../laporan_gaji/laporan_gaji.php" class="<?= $current == 'laporan_gaji.php' ? 'active' : '' ?>">Laporan Gaji</a></li>
    </ul>
</nav>
