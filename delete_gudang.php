<?php
include_once 'config.php';
include_once 'Gudang.php';

$database = new Database();
$db = $database->getConnection();
$gudang = new Gudang($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($gudang->deleteGudang($id)) {
        echo "<script>alert('Data gudang berhasil dihapus.'); window.location.href='list_gudang.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data gudang.'); window.location.href='list_gudang.php';</script>";
    }
} else {
    echo "<script>alert('ID gudang tidak ada.'); window.location.href='list_gudang.php';</script>";
}
?>
