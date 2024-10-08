<?php
include_once 'database.php'; // 
include_once 'gudang.php';  

$database = new Database();
$db = $database->connect();
$gudang = new gudang($db);

if (isset($_POST['submit'])) {
    $gudang->name = $_POST['name'];
    $gudang->location = $_POST['location'];
    $gudang->capacity = $_POST['capacity'];
    $gudang->opening_hour = $_POST['opening_hour'];
    $gudang->closing_hour = $_POST['closing_hour'];

    if ($gudang->create()) {
        echo "Gudang berhasil ditambahkan!";
    } else {
        echo "Gagal menambahkan gudang.";
    }
}
?>

<h2>Tambah Gudang Baru</h2>
<form method="POST" action="">
    <input type="text" name="name" placeholder="Nama Gudang" required>
    <input type="text" name="location" placeholder="Lokasi Gudang" required>
    <input type="number" name="capacity" placeholder="Kapasitas Gudang" required>
    <input type="time" name="opening_hour" placeholder="Jam Buka" required>
    <input type="time" name="closing_hour" placeholder="Jam Tutup" required>
    <input type="submit" name="submit" value="Tambah Gudang">
</form>

<?php
$stmt = $gudang->read();

echo "<h2>Daftar Gudang</h2>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nama Gudang</th>
            <th>Lokasi</th>
            <th>Kapasitas</th>
            <th>Status</th>
            <th>Jam Buka</th>
            <th>Jam Tutup</th>
            <th>Aksi</th>
        </tr>";
        
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['location']}</td>
            <td>{$row['capacity']}</td>
            <td>{$row['status']}</td>
            <td>{$row['opening_hour']}</td>
            <td>{$row['closing_hour']}</td>
            <td>
                <a href='update.php?id={$row['id']}'>Edit</a> |
                <a href='delete.php?id={$row['id']}'>Hapus</a>
            </td>
        </tr>";
}
echo "</table>";
?>