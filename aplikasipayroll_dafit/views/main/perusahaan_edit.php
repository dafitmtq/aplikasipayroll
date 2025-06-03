

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Perusahaan</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <?php 
    // include __DIR__ . '/../layout/header.php'; 
    include __DIR__ . '/../layout/sidebar.php'; 
    ?>

    <div class="container">
        <h2>Edit Data Perusahaan</h2>
        <form method="POST" action="index.php?route=perusahaan/update" class="form-section">
            <input type="hidden" name="id" value="<?= $perusahaan['id'] ?>">

            <div class="form-group">
                <label for="nama">Nama Perusahaan</label>
                <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($perusahaan['nama']) ?>" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" required><?= htmlspecialchars($perusahaan['alamat']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="no_telpon">No. Telepon</label>
                <input type="text" name="no_telpon" id="no_telpon" value="<?= htmlspecialchars($perusahaan['no_telpon']) ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($perusahaan['email']) ?>" required>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a class="btn btn-sm btn-primary" href="index.php?route=perusahaan">Batal</a>
            
        </form>
    </div>
</body>
</html>
