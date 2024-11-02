<?php
require_once 'Config.php';
require_once 'Gudang.php';

$database = new Database();
$db = $database->getConnection();

$gudang = new Gudang($db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Gudang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Gudang</h1>

        <?php if (isset($message)): ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="name">Nama Gudang:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="location">Lokasi:</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="capacity">Kapasitas:</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="aktif">Aktif</option>
                    <option value="tidak_aktif">Tidak Aktif</option>
                </select>
            </div>
            <div class="form-group">
                <label for="opening_hour">Jam Buka:</label>
                <input type="time" class="form-control" id="opening_hour" name="opening_hour" required>
            </div>
            <div class="form-group">
                <label for="closing_hour">Jam Tutup:</label>
                <input type="time" class="form-control" id="closing_hour" name="closing_hour" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Gudang</button>
        </form>

        <div class="mt-4">
            <a href="list_gudang.php" class="btn btn-secondary">Kembali ke Daftar Gudang</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
