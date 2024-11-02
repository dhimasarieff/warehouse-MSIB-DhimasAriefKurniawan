<?php
include_once 'Config.php';
include_once 'Gudang.php';

$database = new Database();
$db = $database->getConnection();
$gudang = new Gudang($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM gudang WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $name = $row['name'];
        $location = $row['location'];
        $capacity = $row['capacity'];
        $status = $row['status'];
        $opening_hour = $row['opening_hour'];
        $closing_hour = $row['closing_hour'];
    } else {
        echo "Gudang tidak ditemukan.";
        exit;
    }
} else {
    echo "ID gudang tidak ada.";
    exit;
}

if ($_POST) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $status = $_POST['status'];
    $opening_hour = $_POST['opening_hour'];
    $closing_hour = $_POST['closing_hour'];

    if ($gudang->updateGudang($id, $name, $location, $capacity, $status, $opening_hour, $closing_hour)) {
        echo "<script>alert('Data gudang berhasil diperbarui.'); window.location.href='list_gudang.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data gudang.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Gudang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Update Gudang</h1>
        <form method="post">
            <div class="form-group">
                <label for="name">Nama Gudang</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>
            <div class="form-group">
                <label for="location">Lokasi Gudang</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo htmlspecialchars($location); ?>" required>
            </div>
            <div class="form-group">
                <label for="capacity">Kapasitas</label>
                <input type="number" class="form-control" id="capacity" name="capacity" value="<?php echo htmlspecialchars($capacity); ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="aktif" <?php echo ($status == 'aktif') ? 'selected' : ''; ?>>Aktif</option>
                    <option value="tidak_aktif" <?php echo ($status == 'tidak_aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                </select>
            </div>
            <div class="form-group">
                <label for="opening_hour">Jam Buka</label>
                <input type="time" class="form-control" id="opening_hour" name="opening_hour" value="<?php echo htmlspecialchars($opening_hour); ?>" required>
            </div>
            <div class="form-group">
                <label for="closing_hour">Jam Tutup</label>
                <input type="time" class="form-control" id="closing_hour" name="closing_hour" value="<?php echo htmlspecialchars($closing_hour); ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Perbarui</button>
            <a href="list_gudang.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
