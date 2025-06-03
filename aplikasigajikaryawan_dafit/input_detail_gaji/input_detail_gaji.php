<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Detail Gaji - Sistem Payroll</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .page-header {
            margin-bottom: 2rem;
        }
        
        .card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        
        .form-section {
            margin-bottom: 2rem;
        }
        
        .form-section h3 {
            color: #2c3e50;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #3498db;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
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
        
        .btn-secondary {
            background-color: #95a5a6;
        }
        
        .btn-secondary:hover {
            background-color: #7f8c8d;
        }
        
        .btn-danger {
            background-color: #dc3545;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
        }
        
        .detail-gaji-section {
            margin-top: 2rem;
        }
        
        .table-container {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 1rem;
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
        
        .detail-form {
            background-color: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        
        .detail-form-row {
            display: grid;
            grid-template-columns: 2fr 2fr 1fr auto;
            gap: 1rem;
            align-items: end;
        }
        
        .total-section {
            background-color: #e8f5e8;
            padding: 1rem;
            border-radius: 8px;
            text-align: right;
        }
        
        .total-amount {
            font-size: 1.5rem;
            font-weight: bold;
            color: #27ae60;
        }
        
        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        
        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
        
        @media (max-width: 768px) {
            .nav ul {
                flex-direction: column;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .detail-form-row {
                grid-template-columns: 1fr;
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
        include '../navbar.php';
    ?>
    
    <div class="container">
        <div class="page-header">
            <h2>Input Detail Gaji</h2>
        </div>
        
        <div class="alert alert-info">
            <strong>Petunjuk:</strong> Pilih slip gaji terlebih dahulu, kemudian tambahkan detail gaji (pendapatan dan potongan) untuk karyawan tersebut.
        </div>
        
        <div class="card">
            <div class="form-section">
                <h3>Informasi Slip Gaji</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="slip_gaji">Pilih Slip Gaji</label>
                        <select id="slip_gaji" class="form-control" required>
                            <option value="">-- Pilih Slip Gaji --</option>
                            <option value="SG001">SG001 - Ahmad Rizki (K001) - PT ABC</option>
                            <option value="SG002">SG002 - Siti Nurhaliza (K002) - PT ABC</option>
                            <option value="SG003">SG003 - Budi Santoso (K003) - PT XYZ</option>
                            <option value="SG004">SG004 - Rina Marlina (K004) - CV DEF</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Slip</label>
                        <input type="date" id="tanggal" class="form-control" readonly>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="karyawan">Nama Karyawan</label>
                        <input type="text" id="karyawan" class="form-control" readonly placeholder="Akan terisi otomatis">
                    </div>
                    <div class="form-group">
                        <label for="perusahaan">Perusahaan</label>
                        <input type="text" id="perusahaan" class="form-control" readonly placeholder="Akan terisi otomatis">
                    </div>
                </div>
            </div>
            
            <div class="detail-gaji-section">
                <h3>Detail Gaji</h3>
                
                <div class="detail-form">
                    <h4>Tambah Item Gaji</h4>
                    <div class="detail-form-row">
                        <div class="form-group">
                            <label for="keterangan_gaji">Keterangan</label>
                            <select id="keterangan_gaji" class="form-control">
                                <option value="">-- Pilih Keterangan --</option>
                                <option value="1" data-type="debit">Gaji Pokok</option>
                                <option value="2" data-type="debit">Tunjangan Transport</option>
                                <option value="3" data-type="debit">Tunjangan Makan</option>
                                <option value="4" data-type="debit">Bonus Kinerja</option>
                                <option value="5" data-type="kredit">Potongan BPJS</option>
                                <option value="6" data-type="kredit">Potongan PPh21</option>
                                <option value="7" data-type="kredit">Potongan Keterlambatan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="number" id="nominal" class="form-control" placeholder="0" min="0">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <input type="text" id="jenis" class="form-control" readonly placeholder="Debit/Kredit">
                        </div>
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-success" onclick="addDetailGaji()">Tambah</button>
                        </div>
                    </div>
                </div>
                
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Keterangan</th>
                                <th>Jenis</th>
                                <th>Nominal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="detail-table-body">
                            <tr>
                                <td colspan="4" style="text-align: center; color: #777;">Belum ada detail gaji yang ditambahkan</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="total-section">
                    <div style="margin-bottom: 0.5rem;">
                        <strong>Total Pendapatan: </strong>
                        <span id="total-pendapatan">Rp 0</span>
                    </div>
                    <div style="margin-bottom: 0.5rem;">
                        <strong>Total Potongan: </strong>
                        <span id="total-potongan">Rp 0</span>
                    </div>
                    <hr style="margin: 1rem 0;">
                    <div class="total-amount">
                        <strong>Total Gaji Bersih: </strong>
                        <span id="total-gaji">Rp 0</span>
                    </div>
                </div>
            </div>
            
            <div class="action-buttons">
                <a href="slip_gaji.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan Detail Gaji</button>
            </div>
        </div>
    </div>
    
    <script>
        let detailGaji = [];
        
        // Event listener untuk perubahan keterangan gaji
        document.getElementById('keterangan_gaji').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const jenisInput = document.getElementById('jenis');
            if (selectedOption.dataset.type) {
                jenisInput.value = selectedOption.dataset.type === 'debit' ? 'Pendapatan' : 'Potongan';
            } else {
                jenisInput.value = '';
            }
        });
        
        // Event listener untuk perubahan slip gaji
        document.getElementById('slip_gaji').addEventListener('change', function() {
            const selectedValue = this.value;
            const karyawanInput = document.getElementById('karyawan');
            const perusahaanInput = document.getElementById('perusahaan');
            const tanggalInput = document.getElementById('tanggal');
            
            // Simulasi data berdasarkan pilihan
            if (selectedValue === 'SG001') {
                karyawanInput.value = 'Ahmad Rizki (K001)';
                perusahaanInput.value = 'PT ABC';
                tanggalInput.value = '2024-05-15';
            } else if (selectedValue === 'SG002') {
                karyawanInput.value = 'Siti Nurhaliza (K002)';
                perusahaanInput.value = 'PT ABC';
                tanggalInput.value = '2024-05-15';
            } else if (selectedValue === 'SG003') {
                karyawanInput.value = 'Budi Santoso (K003)';
                perusahaanInput.value = 'PT XYZ';
                tanggalInput.value = '2024-05-16';
            } else if (selectedValue === 'SG004') {
                karyawanInput.value = 'Rina Marlina (K004)';
                perusahaanInput.value = 'CV DEF';
                tanggalInput.value = '2024-05-16';
            } else {
                karyawanInput.value = '';
                perusahaanInput.value = '';
                tanggalInput.value = '';
            }
        });
        
        function addDetailGaji() {
            const keteranganSelect = document.getElementById('keterangan_gaji');
            const nominalInput = document.getElementById('nominal');
            const jenisInput = document.getElementById('jenis');
            
            if (!keteranganSelect.value || !nominalInput.value || !jenisInput.value) {
                alert('Mohon lengkapi semua field!');
                return;
            }
            
            const keteranganText = keteranganSelect.options[keteranganSelect.selectedIndex].text;
            const nominal = parseFloat(nominalInput.value);
            const jenis = jenisInput.value;
            
            // Tambah ke array
            detailGaji.push({
                keterangan: keteranganText,
                jenis: jenis,
                nominal: nominal
            });
            
            // Reset form
            keteranganSelect.value = '';
            nominalInput.value = '';
            jenisInput.value = '';
            
            // Update tabel dan total
            updateDetailTable();
            updateTotal();
        }
        
        function removeDetailGaji(index) {
            detailGaji.splice(index, 1);
            updateDetailTable();
            updateTotal();
        }
        
        function updateDetailTable() {
            const tbody = document.getElementById('detail-table-body');
            
            if (detailGaji.length === 0) {
                tbody.innerHTML = '<tr><td colspan="4" style="text-align: center; color: #777;">Belum ada detail gaji yang ditambahkan</td></tr>';
                return;
            }
            
            let html = '';
            detailGaji.forEach((item, index) => {
                html += `
                    <tr>
                        <td>${item.keterangan}</td>
                        <td>${item.jenis}</td>
                        <td>Rp ${item.nominal.toLocaleString('id-ID')}</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-small" onclick="removeDetailGaji(${index})">Hapus</button>
                        </td>
                    </tr>
                `;
            });
            
            tbody.innerHTML = html;
        }
        
        function updateTotal() {
            let totalPendapatan = 0;
            let totalPotongan = 0;
            
            detailGaji.forEach(item => {
                if (item.jenis === 'Pendapatan') {
                    totalPendapatan += item.nominal;
                } else {
                    totalPotongan += item.nominal;
                }
            });
            
            const totalGaji = totalPendapatan - totalPotongan;
            
            document.getElementById('total-pendapatan').textContent = 'Rp ' + totalPendapatan.toLocaleString('id-ID');
            document.getElementById('total-potongan').textContent = 'Rp ' + totalPotongan.toLocaleString('id-ID');
            document.getElementById('total-gaji').textContent = 'Rp ' + totalGaji.toLocaleString('id-ID');
        }
    </script>
</body>
</html>