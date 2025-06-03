<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan - Sistem Payroll</title>
    <link rel="stylesheet" href="../style.css">
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
        
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .form-group textarea {
            height: 80px;
            resize: vertical;
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
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #eee;
            font-size: 0.9rem;
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
        
        .search-section {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .search-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr auto;
            gap: 1rem;
            align-items: end;
        }
        
        @media (max-width: 768px) {
            .nav ul {
                flex-direction: column;
            }
            
            .form-row, .search-row {
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
        include '../navbar.php';
    ?>
    
    <div class="container">
        <h2>Data Karyawan</h2>
        
        <div class="form-section">
            <h3>Tambah/Edit Karyawan</h3>
            <form id="karyawanForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="kode_karyawan">Kode Karyawan</label>
                        <input type="text" id="kode_karyawan" name="kode_karyawan" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" required></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="no_telpon">No. Telepon</label>
                        <input type="tel" id="no_telpon" name="no_telpon" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="no_rekening">No. Rekening</label>
                        <input type="text" id="no_rekening" name="no_rekening" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="rek_bank">Bank</label>
                        <select id="rek_bank" name="rek_bank" required>
                            <option value="">Pilih Bank</option>
                            <option value="BCA">BCA</option>
                            <option value="BNI">BNI</option>
                            <option value="BRI">BRI</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="CIMB">CIMB</option>
                            <option value="Danamon">Danamon</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="perusahaan_id">Perusahaan</label>
                        <select id="perusahaan_id" name="perusahaan_id" required>
                            <option value="">Pilih Perusahaan</option>
                            <option value="1">PT Teknologi Maju</option>
                            <option value="2">CV Jaya Makmur</option>
                            <option value="3">PT Bersama Sukses</option>
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn">Reset</button>
            </form>
        </div>
        
        <div class="search-section">
            <div class="search-row">
                <div class="form-group">
                    <label for="search_nama">Cari Nama</label>
                    <input type="text" id="search_nama" placeholder="Masukkan nama karyawan">
                </div>
                
                <div class="form-group">
                    <label for="search_perusahaan">Filter Perusahaan</label>
                    <select id="search_perusahaan">
                        <option value="">Semua Perusahaan</option>
                        <option value="1">PT Teknologi Maju</option>
                        <option value="2">CV Jaya Makmur</option>
                        <option value="3">PT Bersama Sukses</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="search_jabatan">Filter Jabatan</label>
                    <select id="search_jabatan">
                        <option value="">Semua Jabatan</option>
                        <option value="Manager">Manager</option>
                        <option value="Staff">Staff</option>
                        <option value="Supervisor">Supervisor</option>
                    </select>
                </div>
                
                <div>
                    <button type="button" class="btn" onclick="searchKaryawan()">Cari</button>
                </div>
            </div>
        </div>
        
        <div class="table-section">
            <table class="table">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Perusahaan</th>
                        <th>No. Telepon</th>
                        <th>Email</th>
                        <th>Bank</th>
                        <th>No. Rekening</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>EMP001</td>
                        <td>Ahmad Subandi</td>
                        <td>Manager IT</td>
                        <td>PT Teknologi Maju</td>
                        <td>081234567890</td>
                        <td>ahmad@tekmaju.com</td>
                        <td>BCA</td>
                        <td>1234567890</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm" onclick="editKaryawan('EMP001')">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteKaryawan('EMP001')">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>EMP002</td>
                        <td>Siti Nurhaliza</td>
                        <td>Staff Finance</td>
                        <td>CV Jaya Makmur</td>
                        <td>082345678901</td>
                        <td>siti@jayamakmur.co.id</td>
                        <td>BRI</td>
                        <td>2345678901</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm" onclick="editKaryawan('EMP002')">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteKaryawan('EMP002')">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>EMP003</td>
                        <td>Budi Santoso</td>
                        <td>Supervisor</td>
                        <td>PT Bersama Sukses</td>
                        <td>083456789012</td>
                        <td>budi@bersamasukses.com</td>
                        <td>Mandiri</td>
                        <td>3456789012</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm" onclick="editKaryawan('EMP003')">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteKaryawan('EMP003')">Hapus</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
        function editKaryawan(kode) {
            alert('Fitur edit karyawan dengan kode: ' + kode);
        }
        
        function deleteKaryawan(kode) {
            if (confirm('Apakah Anda yakin ingin menghapus karyawan ini?')) {
                alert('Karyawan dengan kode ' + kode + ' telah dihapus');
            }
        }
        
        function searchKaryawan() {
            alert('Fitur pencarian karyawan');
        }
        
        document.getElementById('karyawanForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Data karyawan berhasil disimpan!');
            this.reset();
        });
    </script>
</body>
</html>