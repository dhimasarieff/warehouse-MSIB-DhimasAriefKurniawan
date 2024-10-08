<?php
$id = $_GET['id'];

$query = "SELECT * FROM gudang WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $opening_hour = $_POST['opening_hour'];
    $closing_hour = $_POST['closing_hour'];
    
    $query = "UPDATE gudang SET name = :name, location = :location, capacity = :capacity,
              opening_hour = :opening_hour, closing_hour = :closing_hour WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':capacity', $capacity);
    $stmt->bindParam(':opening_hour', $opening_hour);
    $stmt->bindParam(':closing_hour', $closing_hour);
    
    if ($stmt->execute()) {
        echo "Data berhasil diupdate!";
    } else {
        echo "Gagal mengupdate data.";
    }
}
?>
<form method="POST" action="">
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <input type="text" name="location" value="<?php echo $row['location']; ?>" required>
    <input type="number" name="capacity" value="<?php echo $row['capacity']; ?>" required>
    <input type="time" name="opening_hour" value="<?php echo $row['opening_hour']; ?>" required>
    <input type="time" name="closing_hour" value="<?php echo $row['closing_hour']; ?>" required>
    <input type="submit" name="submit" value="Update Gudang">
</form>
