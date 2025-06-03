<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Gaji - Sistem Payroll</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .page-header {
            margin-bottom: 2rem;
        }
        
        .filter-section {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        
        .filter-section h3 {
            color: #2c3e50;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #3498db;
        }
        
        .form-row {
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
            color: #2c3e50;
        }
        
        .form-control {
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
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
            font-size: 1rem;
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
        
        .btn-warning {
            background-color: #f39c12;
        }
        
        .btn-warning:hover {
            background-color: #e67e22;
        }
        
        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .summary-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .summary-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .summary-card h4 {
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .summary-number {
            font-size: 1.5rem;
            font-weight: bold;
            color: #3498db;
        }
        
        .table-container {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
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
        
        .table-summary {
            background-color: #e8f5e8;
        }
        
        .table-summary td {
            font-weight: bold;
            color: #27ae60;
        }
        
        .chart-container {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        
        .chart-container h3 {
            color: #2c3e50;
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .no-data {
            text-align: center;
            padding: 3rem;
            color: #777;
            font-style: italic;
        }
        
        .print-header {
            display: none;
        }
        
        @media print {
            .nav, .filter-section, .btn-group, .chart-container {
                display: none !important;
            }
            
            .print-header {
                display: block;
                text-align: center;
                margin-bottom: 2rem;
                border-bottom: 2px solid #333;
                padding-bottom: 1rem;
            }
            
            .container {
                max-width: none;
                margin: 0;
            }
            
            .summary-cards {
                page-break-inside: avoid;
            }
        }
        
        @media (max-width: 768px) {
            .nav ul {
                flex-direction: column;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .btn-group {
                flex-direction: column;
            }
            
            .summary-cards {
                grid-template-columns: 1fr;
            }
            
            .table-container {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Sistem Payroll</h1>
    </header>
    
        <?php
        include '../navbar.php';
    ?>
    
    <div class="container">
        <div class="print-header">
            <h1>LAPORAN GAJI KARYAWAN</h1>
            <p>Periode: <span id="print-periode"></span></p>
            <p>Tanggal Cetak: <?php echo date('d/m/Y H:i:s'); ?></p>
        </div>
        
        <div class="page-header">
            <h2>Laporan Gaji</h2>
        </div>
        
        <div class="filter-section">
            <h3>Filter Laporan</h3>
            <form id="filterForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="perusahaan">Perusahaan</label>
                        <select id="perusahaan" class="form-control">
                            <option value="">Semua Perusahaan</option>
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
                            <option value="05" selected>Mei</option>
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
                            <option value="2024" selected>2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_laporan">Jenis Laporan</label>
                        <select id="jenis_laporan" class="form-control">
                            <option value="ringkasan">Ringkasan</option>
                            <option value="detail">Detail</option>
                            <option value="per_perusahaan">Per Perusahaan</option>
                        </select>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn" onclick="generateReport()">Generate Laporan</button>
                    <button type="button" class="btn btn-success" onclick="exportExcel()">Export Excel</button>
                    <button type="button" class="btn btn-warning" onclick="printReport()">Cetak PDF</button>
                </div>
            </form>
        </div>
        
        <div id="report-content" style="display: none;">
            <div class="summary-cards">
                <div class="summary-card">
                    <h4>Total Karyawan</h4>
                    <div class="summary-number">4</div>
                </div>
                <div class="summary-card">
                    <h4>Total Pendapatan</h4>
                    <div class="summary-number">Rp 18.500.000</div>
                </div>
                <div class="summary-card">
                    <h4>Total Potongan</h4>
                    <div class="summary-number">Rp 1.750.000</div>
                </div>
                <div class="summary-card">
                    <h4>Total Gaji Bersih</h4>
                    <div class="summary-number">Rp 16.750.000</div>
                </div>
            </div>
            
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>Perusahaan</th>
                            <th>Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Potongan</th>
                            <th>Gaji Bersih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>K001</td>
                            <td>Ahmad Rizki</td>
                            <td>PT ABC</td>
                            <td>Manager</td>
                            <td>Rp 4.500.000</td>
                            <td>Rp 1.500.000</td>
                            <td>Rp 500.000</td>
                            <td>Rp 5.500.000</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>K002</td>
                            <td>Siti Nurhaliza</td>
                            <td>PT ABC</td>
                            <td>Staff</td>
                            <td>Rp 3.500.000</td>
                            <td>Rp 1.000.000</td>
                            <td>Rp 300.000</td>
                            <td>Rp 4.200.000</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>K003</td>
                            <td>Budi Santoso</td>
                            <td>PT XYZ</td>
                            <td>Supervisor</td>
                            <td>Rp 5.500.000</td>
                            <td>Rp 2.000.000</td>
                            <td>Rp 700.000</td>
                            <td>Rp 6.800.000</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>K004</td>
                            <td>Rina Marlina</td>
                            <td>CV DEF</td>
                            <td>Admin</td>
                            <td>Rp 3.000.000</td>
                            <td>Rp 1.000.000</td>
                            <td>Rp 250.000</td>
                            <td>Rp 3.750.000</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="table-summary">
                            <td colspan="5" style="text-align: right;"><strong>TOTAL:</strong></td>
                            <td><strong>Rp 16.500.000</strong></td>
                            <td><strong>Rp 5.500.000</strong></td>
                            <td><strong>Rp 1.750.000</strong></td>
                            <td><strong>Rp 20.250.000</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        
        <div id="no-data-message" class="table-container">
            <div class="no-data">
                <h3>Belum Ada Data Laporan</h3>
                <p>Silakan pilih filter dan klik "Generate Laporan" untuk melihat data</p>
            </div>
        </div>
    </div>
    
    <script>
        function generateReport() {
            const perusahaan = document.getElementById('perusahaan').value;
            const bulan = document.getElementById('bulan').value;
            const tahun = document.getElementById('tahun').value;
            const jenisLaporan = document.getElementById('jenis_laporan').value;
            
            if (!bulan || !tahun) {
                alert('Mohon pilih bulan dan tahun terlebih dahulu!');
                return;
            }
            
            // Update periode di print header
            const bulanText = document.getElementById('bulan').options[document.getElementById('bulan').selectedIndex].text;
            document.getElementById('print-periode').textContent = bulanText + ' ' + tahun;
            
            // Simulasi generate laporan
            document.getElementById('no-data-message').style.display = 'none';
            document.getElementById('report-content').style.display = 'block';
            
            // Scroll ke hasil laporan
            document.getElementById('report-content').scrollIntoView({ behavior: 'smooth' });
        }
        
        function exportExcel() {
            const reportContent = document.getElementById('report-content');
            if (reportContent.style.display === 'none') {
                alert('Mohon generate laporan terlebih dahulu!');
                return;
            }
            
            // Simulasi export excel
            alert('Export Excel berhasil! File akan didownload...');
        }
        
        function printReport() {
            const reportContent = document.getElementById('report-content');
            if (reportContent.style.display === 'none') {
                alert('Mohon generate laporan terlebih dahulu!');
                return;
            }
            
            // Print laporan
            window.print();
        }
        
        // Auto-generate laporan saat halaman dimuat (untuk demo)
        window.addEventListener('load', function() {
            setTimeout(function() {
                // Simulasi ada data default
                // generateReport();
            }, 500);
        });
    </script>
</body>
</html>