<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Payroll</title>
    <link rel="stylesheet" href="public/css/style.css">
    <style>
.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    width: 250px;
    height: 100vh;
    /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
    background-color: #34495e;
    color: white;
    z-index: 1000;
    overflow-y: auto;
    box-shadow: 2px 0 10px rgba(0,0,0,0.1);
}

.sidebar-header {
    padding: 20px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    text-align: center;
}

.sidebar-header h2 {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
    color: white;
}

.sidebar-nav {
    padding: 20px 0;
}

.sidebar-nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.nav-item {
    margin-bottom: 5px;
}

.nav-link {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
    border-left: 3px solid transparent;
}

.nav-link:hover {
    background-color: rgba(255,255,255,0.1);
    color: white;
    border-left-color: rgba(255,255,255,0.5);
}

.nav-link.active {
    background-color: rgba(255,255,255,0.2);
    color: white;
    border-left-color: white;
    font-weight: 600;
}

.nav-link i {
    width: 20px;
    height: 20px;
    margin-right: 12px;
    display: inline-block;
    text-align: center;
    font-size: 16px;
}

.nav-link span {
    font-size: 14px;
}

.logout-btn {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
    border-left: 3px solid transparent;
}

.logout-btn:hover {
    color: #ff6b6b;
    background-color: rgba(255,107,107,0.1);
    padding-left: 10px;
}

.logout-btn i {
    width: 20px;
    height: 20px;
    margin-right: 12px;
    font-size: 16px;
}

/* Icon styles - using CSS pseudo-elements for simple icons */
.icon-dashboard::before { content: "📊"; }
.icon-building::before { content: "🏢"; }
.icon-users::before { content: "👥"; }
.icon-info::before { content: "ℹ️"; }
.icon-document::before { content: "📄"; }
.icon-edit::before { content: "✏️"; }
.icon-report::before { content: "📋"; }
.icon-logout::before { content: "🚪"; }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .card h3 {
            color: #2c3e50;
            margin-bottom: 1rem;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #3498db;
            margin-bottom: 0.5rem;
        }
        
        @media (max-width: 768px) {
            .nav ul {
                flex-direction: column;
            }
            
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

/* Responsive design */
@media (max-width: 768px) {
    .sidebar {
        width: 200px;
        transform: translateX(-100%);
        transition: transform 0.3s ease;
    }
    
    .sidebar.open {
        transform: translateX(0);
    }
}

/* Main content adjustment */
body {
    margin-left: 250px;
    transition: margin-left 0.3s ease;
}

@media (max-width: 768px) {
    body {
        margin-left: 0;
    }
}
</style>


</head>
<body>
    <!-- <header class="header">
        <h1>Sistem Payroll</h1>
    </header> -->
    
    <!-- <nav class="nav">
        <ul>
            <li><a href="index.php" class="active">Dashboard</a></li>
            <li><a href="views/main/perusahaan.php">Perusahaan</a></li>
            <li><a href="views/main/karyawan.php">Karyawan</a></li>
            <li><a href="views/main/keteranganGaji.php">Keterangan Gaji</a></li>
            <li><a href="views/main/slipGaji.php">Slip Gaji</a></li>
            <li><a href="views/main/inputDetailGaji.php">Input Detail Gaji</a></li>
            <li><a href="views/main/laporanGaji.php">Laporan Gaji</a></li>
        </ul>
    </nav> -->

    <!-- <nav class="nav">
    <ul>
        <li><a href="index.php?route=dashboard" class="<?= $current == 'dashboard' ? 'active' : '' ?>">Dashboard</a></li>
        <li><a href="index.php?route=perusahaan" class="<?= $current == 'perusahaan' ? 'active' : '' ?>">Perusahaan</a></li>
        <li><a href="index.php?route=karyawan" class="<?= $current == 'karyawan' ? 'active' : '' ?>">Karyawan</a></li>
        <li><a href="index.php?route=keteranganGaji" class="<?= $current == 'keteranganGaji' ? 'active' : '' ?>">Keterangan Gaji</a></li>
        <li><a href="index.php?route=slipGaji" class="<?= $current == 'slipGaji' ? 'active' : '' ?>">Slip Gaji</a></li>
        <li><a href="index.php?route=inputDetailGaji" class="<?= $current == 'inputDetailGaji' ? 'active' : '' ?>">Input Detail Gaji</a></li>
        <li><a href="index.php?route=laporanGaji" class="<?= $current == 'laporanGaji' ? 'active' : '' ?>">Laporan Gaji</a></li>
    </ul>
</nav> -->

<div class="sidebar">
    <div class="sidebar-header">
        <h2>Sistem Payroll</h2>
    </div>
    
    <nav class="sidebar-nav">
        <ul>
            <li class="nav-item">
                <a href="index.php?route=dashboard" class="nav-link <?= $current_route == 'dashboard' ? 'active' : '' ?>">
                    <i class="icon-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?route=perusahaan" class="nav-link <?= $current_route == 'perusahaan' ? 'active' : '' ?>">
                    <i class="icon-building"></i>
                    <span>Perusahaan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?route=karyawan" class="nav-link <?= $current_route == 'karyawan' ? 'active' : '' ?>">
                    <i class="icon-users"></i>
                    <span>Karyawan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?route=keteranganGaji" class="nav-link <?= $current_route == 'keteranganGaji' ? 'active' : '' ?>">
                    <i class="icon-info"></i>
                    <span>Keterangan Gaji</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?route=slipGaji" class="nav-link <?= $current_route == 'slipGaji' ? 'active' : '' ?>">
                    <i class="icon-document"></i>
                    <span>Slip Gaji</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?route=inputDetailGaji" class="nav-link <?= $current_route == 'inputDetailGaji' ? 'active' : '' ?>">
                    <i class="icon-edit"></i>
                    <span>Input Detail Gaji</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?route=laporanGaji" class="nav-link <?= $current_route == 'laporanGaji' ? 'active' : '' ?>">
                    <i class="icon-report"></i>
                    <span>Laporan Gaji</span>
                </a>
            </li>
                        <li class="nav-item logout-item">
                <a href="index.php?route=logout" class="nav-link logout-btn" onclick="return confirm('Yakin ingin logout?')">
                    <i class="icon-logout"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
    
    <?php
    
    // Debugging (opsional, bisa dihapus di production)
    // echo '<pre>';
    // echo "Debug di View:\n";
    // var_dump(isset($data) ? $data : 'Data tidak tersedia');
    // echo '</pre>';

    // Periksa apakah data tersedia
    if (isset($data) && is_array($data)):
        $total_perusahaan = $data['total_perusahaan'] ?? 0;
        $total_karyawan = $data['total_karyawan'] ?? 0;
        $total_slip = $data['total_slip'] ?? 0;
        $total_gaji_bulan_ini = $data['total_gaji_bulan_ini'] ?? 0;
    ?>
        <!-- <ul>
            <li>
                <span class="label">Total Karyawan: </span>
                <?php echo htmlspecialchars($total_karyawan); ?>
            </li>
            <li>
                <span class="label">Jumlah Slip Gaji: </span>
                <?php echo htmlspecialchars($total_slip); ?>
            </li>
            <li>
                <span class="label">Total Gaji Bulan Ini: </span>Rp 
                <?php echo number_format($total_gaji_bulan_ini, 0, ',', '.'); ?>
            </li>
        </ul> -->

    <div class="container">
        <h2>Dashboard</h2>
        
        <div class="dashboard-grid">
            <div class="card">
                <h3>Total Perusahaan</h3>
                <div class="stat-number">
                    <?php echo htmlspecialchars($total_perusahaan); ?>
                </div>
                <p>Perusahaan terdaftar</p>
            </div>
            
            <div class="card">
                <h3>Total Karyawan</h3>
                <div class="stat-number">
                <?php echo htmlspecialchars($total_karyawan); ?>

                </div>
                <p>Karyawan aktif</p>
            </div>
            
            <div class="card">
                <h3>Slip Gaji Bulan Ini</h3>
                <div class="stat-number">
                <?php echo htmlspecialchars($total_slip); ?>

                </div>
                <p>Slip telah diproses</p>
            </div>
            
            <div class="card">
                <h3>Total Penggajian</h3>
                <div class="stat-number">
                <?php echo number_format($total_gaji_bulan_ini, 0, ',', '.'); ?>

                </div>
                <p>Bulan ini</p>
            </div>
        </div>

    <?php else: ?>
        <p class="error">Data tidak tersedia. Silakan periksa koneksi database atau model.</p>
    <?php endif; ?>
</body>
</html>