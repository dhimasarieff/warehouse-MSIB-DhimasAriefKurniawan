<?php
include_once 'Config.php';

if ($_POST) {
    $database = new Database();
    $db = $database->getConnection();

    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $status = $_POST['status'];
    $opening_hour = $_POST['opening_hour'];
    $closing_hour = $_POST['closing_hour'];

    $query = "INSERT INTO gudang (name, location, capacity, status, opening_hour, closing_hour) VALUES (:name, :location, :capacity, :status, :opening_hour, :closing_hour)";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':capacity', $capacity);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':opening_hour', $opening_hour);
    $stmt->bindParam(':closing_hour', $closing_hour);
    
    if ($stmt->execute()) {
        echo "<script>alert('Data gudang berhasil ditambahkan.'); window.location.href='list_gudang.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data gudang.');</script>";
    }
}
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
    <div class="container mt-5">
        <h1>Tambah Gudang</h1>
        <form method="post">
            <div class="form-group">
                <label for="name">Nama Gudang</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="location">Lokasi Gudang</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="capacity">Kapasitas</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="aktif">Aktif</option>
                    <option value="tidak_aktif">Tidak Aktif</option>
                </select>
            </div>
            <div class="form-group">
                <label for="opening_hour">Jam Buka</label>
                <input type="time" class="form-control" id="opening_hour" name="opening_hour" required>
            </div>
            <div class="form-group">
                <label for="closing_hour">Jam Tutup</label>
                <input type="time" class="form-control" id="closing_hour" name="closing_hour" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="list_gudang.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
