<?php
class Gudang {
    private $conn;
    private $table_name = "gudang";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function updateGudang($id, $name, $location, $capacity, $status, $opening_hour, $closing_hour) {
        $query = "UPDATE " . $this->table_name . "
                  SET name = :name,
                      location = :location,
                      capacity = :capacity,
                      status = :status,
                      opening_hour = :opening_hour,
                      closing_hour = :closing_hour
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':capacity', $capacity);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':opening_hour', $opening_hour);
        $stmt->bindParam(':closing_hour', $closing_hour);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deleteGudang($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function createGudang() {
        $query = "INSERT INTO " . $this->table_name . " (name, location, capacity, status, opening_hour, closing_hour) VALUES (:name, :location, :capacity, :status, :opening_hour, :closing_hour)";
        
        $stmt = $this->conn->prepare($query);

        // Eksekusi pernyataan
        if ($stmt->execute()) {
            return true;
        }

        // Debugging jika eksekusi gagal
        echo "Error: " . $stmt->errorInfo()[2];
        return false;
    }
    
}

?>
