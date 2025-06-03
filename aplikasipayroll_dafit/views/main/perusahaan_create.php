<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Perusahaan - Sistem Payroll</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <!-- <header class="header">
        <h1>Sistem Payroll</h1>
    </header> -->

    <?php include __DIR__ . '/../layout/sidebar.php'; ?>

    <div class="container">
        <h2>Tambah Data Perusahaan</h2>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <div class="form-section">
            <form method="POST" action="index.php?route=perusahaan/store">
                <div class="form-row">
                    <div class="form-group">
                        <label for="nama">Nama Perusahaan</label>
                        <input type="text" name="nama" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" required></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="no_telpon">No. Telepon</label>
                        <input type="tel" name="no_telpon" id="no_telpon" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="index.php?route=perusahaan" class="btn btn-primary">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>