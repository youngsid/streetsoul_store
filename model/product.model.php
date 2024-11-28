<?php

class ProductModel
{
    private $conn;
    private $table = "product";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->pdo_get_connection();
    }

    public function insert($name, $price, $quantity, $description, $image, $cate)
    {
        // $hashedPassword = password_hash($storedHash, PASSWORD_DEFAULT);
        $query = "INSERT INTO " . $this->table . " (name,price,quantity,description,image,cate) VALUES (:name,:price,:quantity,:description,:image,:cate)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':cate', $cate);
        return $stmt->execute();
    }

    public function listAll($deleted)
    {
        $query = "SELECT * , product.name as name,category.name as cateName,product.id as id
                FROM {$this->table} JOIN category ON product.cate = category.id WHERE product.deleted = :deleted";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':deleted', $deleted);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listAllCate($cate)
    {
        $query = "SELECT * 
                FROM {$this->table} WHERE deleted = 0 and cate = :cate";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':cate', $cate);
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

    public function update($id, $name, $price, $quantity, $description, $image, $cate)
    {
        $query = "UPDATE {$this->table} SET name = :name , price = :price , quantity = :quantity ,description = :description ,image = :image ,cate = :cate WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':cate', $cate);
        $stmt->execute();

        // return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteOne($id, $deleted)
    {
        $query = "UPDATE {$this->table} SET deleted = :deleted WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':deleted', $deleted);
        $stmt->execute();
    }


    public function listAllOther($id)
    {
        $query = "SELECT * , product.name as name,category.name as cateName,product.id as id
                FROM {$this->table} JOIN category ON product.cate = category.id WHERE product.deleted = 0 and product.id != :id LIMIT 5";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
