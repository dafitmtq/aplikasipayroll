<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keterangan Gaji - Sistem Payroll</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <style>
        .form-section {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        
        .form-group input, .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .btn {
            background-color: #3498db;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #2980b9;
        }
        
        .btn-danger {
            background-color: #e74c3c;
        }
        
        .btn-danger:hover {
            background-color: #c0392b;
        }
        
        .btn-success {
            background-color: #27ae60;
        }
        
        .btn-success:hover {
            background-color: #219a52;
        }
        
        .table-section {
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
        
        .table th, .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        
        .table tr:hover {
            background-color: #f8f9fa;
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-sm {
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
        }
        
        .badge {
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: bold;
        }
        
        .badge-debit {
            background-color: #d4edda;
            color: #155724;
        }
        
        .badge-kredit {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .info-section {
            background: #e3f2fd;
            border: 1px solid #bbdefb;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 2rem;
        }
        
        .info-section h4 {
            color: #1976d2;
            margin-bottom: 0.5rem;
        }
        
        @media (max-width: 768px) {
            .nav ul {
                flex-direction: column;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .table-section {
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
        <h2>Keterangan Gaji</h2>
        
        <div class="info-section">
            <h4>Informasi</h4>
            <p><strong>Debit:</strong> Komponen yang menambah gaji (gaji pokok, tunjangan, bonus, dll.)</p>
            <p><strong>Kredit:</strong> Komponen yang mengurangi gaji (potongan BPJS, pajak, dll.)</p>
        </div>
        
        <div class="form-section">
            <h3>Tambah/Edit Keterangan Gaji</h3>
            <form id="keteranganForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" id="keterangan" name="keterangan" placeholder="Contoh: Gaji Pokok, Tunjangan Transport" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="debitkredit">Jenis</label>
                        <select id="debitkredit" name="debitkredit" required>
                            <option value="">Pilih Jenis</option>
                            <option value="Debit">Debit (Penambah Gaji)</option>
                            <option value="Kredit">Kredit (Pengurang Gaji)</option>
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn">Reset</button>
            </form>
        </div>
        
        <div class="table-section">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Keterangan</th>
                        <th>Jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Gaji Pokok</td>
                        <td><span class="badge badge-debit">Debit</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm" onclick="editKeterangan(1)">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteKeterangan(1)">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Tunjangan Transport</td>
                        <td><span class="badge badge-debit">Debit</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm" onclick="editKeterangan(2)">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteKeterangan(2)">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Tunjangan Makan</td>
                        <td><span class="badge badge-debit">Debit</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm" onclick="editKeterangan(3)">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteKeterangan(3)">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Bonus Kinerja</td>
                        <td><span class="badge badge-debit">Debit</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm" onclick="editKeterangan(4)">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteKeterangan(4)">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Potongan BPJS Kesehatan</td>
                        <td><span class="badge badge-kredit">Kredit</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm" onclick="editKeterangan(5)">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteKeterangan(5)">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Potongan BPJS Ketenagakerjaan</td>
                        <td><span class="badge badge-kredit">Kredit</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm" onclick="editKeterangan(6)">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteKeterangan(6)">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Pajak PPh 21</td>
                        <td><span class="badge badge-kredit">Kredit</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm" onclick="editKeterangan(7)">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteKeterangan(7)">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Potongan Keterlambatan</td>
                        <td><span class="badge badge-kredit">Kredit</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm" onclick="editKeterangan(8)">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteKeterangan(8)">Hapus</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
        function editKeterangan(no) {
            alert('Fitur edit keterangan gaji dengan no: ' + no);
        }
        
        function deleteKeterangan(no) {
            if (confirm('Apakah Anda yakin ingin menghapus keterangan gaji ini?')) {
                alert('Keterangan gaji dengan no ' + no + ' telah dihapus');
            }
        }
        
        document.getElementById('keteranganForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Keterangan gaji berhasil disimpan!');
            this.reset();
        });
    </script>
</body>
</html>