<?php

class CategoryModel
{
    private $conn;
    private $table = "category";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->pdo_get_connection();
    }

    public function insert($name)
    {
        // $hashedPassword = password_hash($storedHash, PASSWORD_DEFAULT);
        $query = "INSERT INTO " . $this->table . " (name) VALUES (:name)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    }

    public function listAll()
    {
        $query = "SELECT * 
                FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($id)
    {
        $query = "SELECT * 
                FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name)
    {
        $query = "UPDATE {$this->table} SET name = :name WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->execute();

        // return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteOne($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
