<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perusahaan - Sistem Payroll</title>
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
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        
        .form-group input, .form-group textarea {
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
        
        @media (max-width: 768px) {
            .nav ul {
                flex-direction: column;
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
        <h2>Data Perusahaan</h2>
        
        <div class="form-section">
            <h3>Edit Data Perusahaan</h3>
            <form id="perusahaanForm">
                <div class="form-group">
                    <label for="nama">Nama Perusahaan</label>
                    <input type="text" id="nama" name="nama" required>
                </div>
                
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="no_telpon">No. Telepon</label>
                    <input type="tel" id="no_telpon" name="no_telpon" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn">Reset</button>
            </form>
        </div>
        
        <div class="table-section">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>PT Teknologi Maju</td>
                        <td>Jl. Sudirman No. 123, Jakarta</td>
                        <td>021-12345678</td>
                        <td>info@tekmaju.com</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm" onclick="editPerusahaan(1)">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deletePerusahaan(1)">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>CV Jaya Makmur</td>
                        <td>Jl. Gatot Subroto No. 456, Bandung</td>
                        <td>022-87654321</td>
                        <td>contact@jayamakmur.co.id</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm" onclick="editPerusahaan(2)">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deletePerusahaan(2)">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>PT Bersama Sukses</td>
                        <td>Jl. Ahmad Yani No. 789, Surabaya</td>
                        <td>031-11223344</td>
                        <td>admin@bersamasukses.com</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-sm" onclick="editPerusahaan(3)">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deletePerusahaan(3)">Hapus</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
        function editPerusahaan(id) {
            // Fungsi untuk edit perusahaan
            alert('Fitur edit perusahaan dengan ID: ' + id);
        }
        
        function deletePerusahaan(id) {
            if (confirm('Apakah Anda yakin ingin menghapus perusahaan ini?')) {
                alert('Perusahaan dengan ID ' + id + ' telah dihapus');
            }
        }
        
        document.getElementById('perusahaanForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Data perusahaan berhasil disimpan!');
            this.reset();
        });
    </script>
</body>
</html>