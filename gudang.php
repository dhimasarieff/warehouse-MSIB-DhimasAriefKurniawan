<?php
class gudang {
    private $conn;
    private $table = 'gudang';

    public $id;
    public $name;
    public $location;
    public $capacity;
    public $opening_hour;
    public $closing_hour;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " 
                  (name, location, capacity, opening_hour, closing_hour) 
                  VALUES (:name, :location, :capacity, :opening_hour, :closing_hour)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':capacity', $this->capacity);
        $stmt->bindParam(':opening_hour', $this->opening_hour);
        $stmt->bindParam(':closing_hour', $this->closing_hour);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>