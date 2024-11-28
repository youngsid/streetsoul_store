<?php

class CartModel
{
    private $conn;
    private $table = "cartPro";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->pdo_get_connection();
    }

    public function insert($product, $user, $color)
    {
        $result = $this->checkCart($product, $user, $color);
        if ($result) {
            $this->update($result['id'], $result['quantity'] + 1);
            return true;
        } else {
            $query = "INSERT INTO " . $this->table . " (product,user,color) VALUES (:product,:user,:color)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':product', $product);
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':color', $color);
            return $stmt->execute();
        }

        // $hashedPassword = password_hash($storedHash, PASSWORD_DEFAULT);

    }

    public function checkCart($product, $user, $color)
    {
        $query = "SELECT * 
                FROM {$this->table} WHERE product = :product and user = :user and color = :color";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product', $product);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':color', $color);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listAll($user)
    {
        $query = "SELECT * ,cartPro.id as id, color.name as colorName,product.name as name,cartPro.quantity as quantity
                FROM {$this->table} JOIN product ON product.id = cartPro.product JOIN color ON color.id = cartPro.color WHERE user = :user";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user', $user);
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

    public function update($id, $quantity)
    {
        $query = "UPDATE {$this->table} SET quantity = :quantity WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':quantity', $quantity);
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

    public function deleteMany($user)
    {
        $query = "DELETE FROM {$this->table} WHERE user = :user";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user', $user);
        $stmt->execute();
    }
}
