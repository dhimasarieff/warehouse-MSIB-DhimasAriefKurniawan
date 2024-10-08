<?php
$id = $_GET['id'];

$query = "UPDATE gudang SET status = 'tidak_aktif' WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    echo "Gudang berhasil dinonaktifkan!";
} else {
    echo "Gagal menghapus data.";
}
?>
