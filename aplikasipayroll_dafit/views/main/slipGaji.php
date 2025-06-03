<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji - Sistem Payroll</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <style>
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .btn {
            background-color: #3498db;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #2980b9;
        }
        
        .btn-success {
            background-color: #27ae60;
        }
        
        .btn-success:hover {
            background-color: #229954;
        }
        
        .search-filter {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .filter-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
        }
        
        .form-group label {
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        
        .form-control {
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .table-container {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .table th,
        .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #2c3e50;
        }
        
        .table tr:hover {
            background-color: #f8f9fa;
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-small {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
        
        .btn-info {
            background-color: #17a2b8;
        }
        
        .btn-info:hover {
            background-color: #138496;
        }
        
        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }
        
        .btn-warning:hover {
            background-color: #e0a800;
        }
        
        .btn-danger {
            background-color: #dc3545;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            gap: 0.5rem;
        }
        
        .pagination a {
            padding: 0.5rem 1rem;
            text-decoration: none;
            color: #3498db;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .pagination a:hover,
        .pagination .active {
            background-color: #3498db;
            color: white;
        }
        
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: bold;
        }
        
        .status-processed {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        @media (max-width: 768px) {
            .nav ul {
                flex-direction: column;
            }
            
            .page-header {
                flex-direction: column;
                gap: 1rem;
            }
            
            .filter-row {
                grid-template-columns: 1fr;
            }
            
            .table-container {
                overflow-x: auto;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Sistem Payroll</h1>
    </header>
    
        <?php
        include '../layout/navbar.php';
    ?>
    

    <div class="container">
        <div class="page-header">
            <h2>Slip Gaji</h2>
            <a href="tambah_slip_gaji.php" class="btn btn-success">+ Tambah Slip Gaji</a>
        </div>
        
        <div class="search-filter">
            <div class="filter-row">
                <div class="form-group">
                    <label for="search">Cari Karyawan</label>
                    <input type="text" id="search" class="form-control" placeholder="Nama atau kode karyawan...">
                </div>
                <div class="form-group">
                    <label for="perusahaan">Perusahaan</label>
                    <select id="perusahaan" class="form-control">
                        <option value="">Pilih Perusahaan</option>
                        <option value="1">PT ABC</option>
                        <option value="2">PT XYZ</option>
                        <option value="3">CV DEF</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bulan">Bulan</label>
                    <select id="bulan" class="form-control">
                        <option value="">Pilih Bulan</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <select id="tahun" class="form-control">
                        <option value="">Pilih Tahun</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                    </select>
                </div>
            </div>
            <button class="btn">Cari</button>
        </div>
        
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>No. Ref</th>
                        <th>Tanggal</th>
                        <th>Kode Karyawan</th>
                        <th>Nama Karyawan</th>
                        <th>Perusahaan</th>
                        <th>Total Gaji</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>SG001</td>
                        <td>15/05/2024</td>
                        <td>K001</td>
                        <td>Ahmad Rizki</td>
                        <td>PT ABC</td>
                        <td>Rp 5.500.000</td>
                        <td><span class="status-badge status-processed">Diproses</span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="detail_slip_gaji.php?ref=SG001" class="btn btn-info btn-small">Detail</a>
                                <a href="cetak_slip_gaji.php?ref=SG001" class="btn btn-success btn-small">Cetak</a>
                                <a href="edit_slip_gaji.php?ref=SG001" class="btn btn-warning btn-small">Edit</a>
                                <a href="hapus_slip_gaji.php?ref=SG001" class="btn btn-danger btn-small" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>SG002</td>
                        <td>15/05/2024</td>
                        <td>K002</td>
                        <td>Siti Nurhaliza</td>
                        <td>PT ABC</td>
                        <td>Rp 4.200.000</td>
                        <td><span class="status-badge status-processed">Diproses</span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="detail_slip_gaji.php?ref=SG002" class="btn btn-info btn-small">Detail</a>
                                <a href="cetak_slip_gaji.php?ref=SG002" class="btn btn-success btn-small">Cetak</a>
                                <a href="edit_slip_gaji.php?ref=SG002" class="btn btn-warning btn-small">Edit</a>
                                <a href="hapus_slip_gaji.php?ref=SG002" class="btn btn-danger btn-small" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>SG003</td>
                        <td>16/05/2024</td>
                        <td>K003</td>
                        <td>Budi Santoso</td>
                        <td>PT XYZ</td>
                        <td>Rp 6.800.000</td>
                        <td><span class="status-badge status-pending">Pending</span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="detail_slip_gaji.php?ref=SG003" class="btn btn-info btn-small">Detail</a>
                                <a href="cetak_slip_gaji.php?ref=SG003" class="btn btn-success btn-small">Cetak</a>
                                <a href="edit_slip_gaji.php?ref=SG003" class="btn btn-warning btn-small">Edit</a>
                                <a href="hapus_slip_gaji.php?ref=SG003" class="btn btn-danger btn-small" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>SG004</td>
                        <td>16/05/2024</td>
                        <td>K004</td>
                        <td>Rina Marlina</td>
                        <td>CV DEF</td>
                        <td>Rp 3.750.000</td>
                        <td><span class="status-badge status-processed">Diproses</span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="detail_slip_gaji.php?ref=SG004" class="btn btn-info btn-small">Detail</a>
                                <a href="cetak_slip_gaji.php?ref=SG004" class="btn btn-success btn-small">Cetak</a>
                                <a href="edit_slip_gaji.php?ref=SG004" class="btn btn-warning btn-small">Edit</a>
                                <a href="hapus_slip_gaji.php?ref=SG004" class="btn btn-danger btn-small" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div class="pagination">
                <a href="#">&laquo; Sebelumnya</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">Selanjutnya &raquo;</a>
            </div>
        </div>
    </div>
</body>
</html>