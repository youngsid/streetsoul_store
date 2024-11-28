<?php

class ColorModel
{
    private $conn;
    private $table = "color";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->pdo_get_connection();
    }

    public function insert($name, $code)
    {
        // $hashedPassword = password_hash($storedHash, PASSWORD_DEFAULT);
        $query = "INSERT INTO " . $this->table . " (name,code) VALUES (:name,:code)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':code', $code);
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

    public function update($id, $name, $code)
    {
        $query = "UPDATE {$this->table} SET name = :name , code = :code WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':code', $code);
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
