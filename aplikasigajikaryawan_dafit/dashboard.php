<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Payroll</title>
    <link rel="stylesheet" href="style.css">
    <style>
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
        
        .recent-activity {
            margin-top: 2rem;
        }
        
        .activity-list {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .activity-item {
            padding: 1rem;
            border-bottom: 1px solid #eee;
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-date {
            color: #777;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .nav ul {
                flex-direction: column;
            }
            
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Sistem Payroll</h1>
    </header>
    
    <nav class="nav">
        <ul>
            <li><a href="dashboard.php" class="active">Dashboard</a></li>
            <li><a href="perusahaan/perusahaan.php">Perusahaan</a></li>
            <li><a href="karyawan/karyawan.php">Karyawan</a></li>
            <li><a href="keterangan_gaji/keterangan_gaji.php">Keterangan Gaji</a></li>
            <li><a href="slip_gaji/slip_gaji.php">Slip Gaji</a></li>
            <li><a href="input_detail_gaji/input_detail_gaji.php">Input Detail Gaji</a></li>
            <li><a href="laporan_gaji/laporan_gaji.php">Laporan Gaji</a></li>
        </ul>
    </nav>
    
    <div class="container">
        <h2>Dashboard</h2>
        
        <div class="dashboard-grid">
            <div class="card">
                <h3>Total Perusahaan</h3>
                <div class="stat-number">5</div>
                <p>Perusahaan terdaftar</p>
            </div>
            
            <div class="card">
                <h3>Total Karyawan</h3>
                <div class="stat-number">127</div>
                <p>Karyawan aktif</p>
            </div>
            
            <div class="card">
                <h3>Slip Gaji Bulan Ini</h3>
                <div class="stat-number">85</div>
                <p>Slip telah diproses</p>
            </div>
            
            <div class="card">
                <h3>Total Penggajian</h3>
                <div class="stat-number">Rp 450M</div>
                <p>Bulan ini</p>
            </div>
        </div>
        
        <div class="recent-activity">
            <h3>Aktivitas Terbaru</h3>
            <div class="activity-list">
                <div class="activity-item">
                    <strong>Slip gaji karyawan PT ABC telah diproses</strong>
                    <div class="activity-date">2 jam yang lalu</div>
                </div>
                <div class="activity-item">
                    <strong>Data karyawan baru ditambahkan</strong>
                    <div class="activity-date">5 jam yang lalu</div>
                </div>
                <div class="activity-item">
                    <strong>Laporan gaji bulanan telah dibuat</strong>
                    <div class="activity-date">1 hari yang lalu</div>
                </div>
                <div class="activity-item">
                    <strong>Keterangan gaji baru ditambahkan</strong>
                    <div class="activity-date">2 hari yang lalu</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>