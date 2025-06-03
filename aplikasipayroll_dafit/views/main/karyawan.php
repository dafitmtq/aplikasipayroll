<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan - Sistem Payroll</title>
    <link rel="stylesheet" href="public/css/style.css">
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
        
        .btn {
            background-color: #3498db;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
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

        .search-results-info {
            background: #e3f2fd;
            border: 1px solid #2196f3;
            border-radius: 4px;
            padding: 0.75rem;
            margin-bottom: 1rem;
            color: #1976d2;
        }

        .reset-search {
            background-color: #6c757d;
            margin-left: 0.5rem;
        }

        .reset-search:hover {
            background-color: #5a6268;
        }
        
        @media (max-width: 768px) {
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
    <?php
        if (file_exists(__DIR__ . '/../layout/sidebar.php')) {
            include_once __DIR__ . '/../layout/sidebar.php';
        }
    ?>
    
    <div class="container">
        <h2>Data Karyawan</h2>
        
        <!--FORM PENCARIAN -->
        <div class="search-section">
            <form method="GET" action="">
                <input type="hidden" name="route" value="karyawan">
                <div class="search-row">
                    <div class="form-group">
                        <label for="search_nama">Cari Nama</label>
                        <input type="text" id="search_nama" name="search_nama" 
                               placeholder="Masukkan nama karyawan" 
                               value="<?= isset($_GET['search_nama']) ? htmlspecialchars($_GET['search_nama']) : '' ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="search_perusahaan">Filter Perusahaan</label>
                        <select id="search_perusahaan" name="search_perusahaan">
                            <option value="">Semua Perusahaan</option>
                            <?php if (isset($perusahaan_list) && !empty($perusahaan_list)): ?>
                                <?php foreach ($perusahaan_list as $perusahaan): ?>
                                    <option value="<?= $perusahaan['id'] ?>" 
                                            <?= (isset($_GET['search_perusahaan']) && $_GET['search_perusahaan'] == $perusahaan['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($perusahaan['nama']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="search_jabatan">Filter Jabatan</label>
                        <select id="search_jabatan" name="search_jabatan">
                            <option value="">Semua Jabatan</option>
                            <?php if (isset($jabatan_list) && !empty($jabatan_list)): ?>
                                <?php foreach ($jabatan_list as $jabatan): ?>
                                    <option value="<?= htmlspecialchars($jabatan['jabatan']) ?>" 
                                            <?= (isset($_GET['search_jabatan']) && $_GET['search_jabatan'] == $jabatan['jabatan']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($jabatan['jabatan']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    
                    <div class="search-container">
                        <button type="submit" class="btn">Cari</button>
                        <a href="index.php?route=karyawan" class="btn reset-search">Reset</a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Hasil Search -->
        <?php if (isset($is_search) && $is_search): ?>
            <div class="search-results-info">
                <strong>Hasil Pencarian:</strong> Ditemukan <?= count($data) ?> karyawan
                <?php
                    $search_terms = array();
                    if (!empty($_GET['search_nama'])) $search_terms[] = "nama: '" . htmlspecialchars($_GET['search_nama']) . "'";
                    if (!empty($_GET['search_perusahaan'])) {
                        $selected_perusahaan = '';
                        if (isset($perusahaan_list)) {
                            foreach ($perusahaan_list as $p) {
                                if ($p['id'] == $_GET['search_perusahaan']) {
                                    $selected_perusahaan = $p['nama'];
                                    break;
                                }
                            }
                        }
                        if ($selected_perusahaan) $search_terms[] = "perusahaan: '" . htmlspecialchars($selected_perusahaan) . "'";
                    }
                    if (!empty($_GET['search_jabatan'])) $search_terms[] = "jabatan: '" . htmlspecialchars($_GET['search_jabatan']) . "'";
                    
                    if (!empty($search_terms)) {
                        echo " dengan kriteria: " . implode(', ', $search_terms);
                    }
                ?>
            </div>
        <?php endif; ?>
        
        <!-- TABEL DATA -->
        <div class="table-section">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Karyawan</th>
                        <th>Nama</th>
                        <th>Alamat</th>
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
                    <?php if (isset($data) && !empty($data)): ?>
                        <?php $no = 1; ?>
                        <?php $kry = "KRY"; ?>
                        <?php foreach ($data as $row): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $kry . htmlspecialchars($row['kode_karyawan']) ?></td>
                                <td><?= htmlspecialchars($row['nama']) ?></td>
                                <td><?= htmlspecialchars($row['alamat']) ?></td>
                                <td><?= htmlspecialchars($row['jabatan']) ?></td>
                                <td><?= isset($row['nama']) ? htmlspecialchars($row['nama']) : '-' ?></td>
                                <td><?= htmlspecialchars($row['no_telp']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['rek_bank']) ?></td>
                                <td><?= htmlspecialchars($row['no_rekening']) ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="index.php?route=karyawan/edit&id=<?= $row['kode_karyawan'] ?>" class="btn btn-sm">Edit</a>
                                        <a href="index.php?route=karyawan/delete&id=<?= $row['kode_karyawan'] ?>" 
                                           class="btn btn-sm btn-danger" 
                                           onclick="return confirm('Yakin ingin menghapus karyawan <?= htmlspecialchars($row['nama']) ?>?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="11" style="text-align: center; padding: 2rem;">
                                <?php if (isset($is_search) && $is_search): ?>
                                    Tidak ada karyawan yang sesuai dengan kriteria pencarian. 
                                    <a href="index.php?route=karyawan">Tampilkan semua data</a>
                                <?php else: ?>
                                    Belum ada data karyawan. 
                                    <a href="index.php?route=karyawan/create">Tambah karyawan pertama</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
        // Enter key submit for search input
        document.getElementById('search_nama').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.querySelector('form').submit();
            }
        });
    </script>
</body>
</html>