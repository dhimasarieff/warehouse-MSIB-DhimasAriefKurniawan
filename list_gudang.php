<?php
include_once 'config.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM gudang";
$stmt = $db->prepare($query);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Gudang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-custom {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Gudang</h1>
        
        <div class="text-center">
            <a href="create_gudang.php" class="btn btn-primary btn-custom">Create Gudang</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Kapasitas</th>
                    <th>Status</th>
                    <th>Jam Buka</th>
                    <th>Jam Tutup</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td>" . $row['capacity'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['opening_hour'] . "</td>";
                    echo "<td>" . $row['closing_hour'] . "</td>";
                    echo "<td>
                            <a href='update_gudang.php?id=" . $row['id'] . "' class='btn btn-warning btn-custom'>Update</a>
                            <a href='delete_gudang.php?id=" . $row['id'] . "' class='btn btn-danger btn-custom'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
