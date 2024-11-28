<?php

class OrderModel
{
    private $conn;
    private $table = "orders";
    private $tableChild = "orderPro";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->pdo_get_connection();
    }

    public function insert($user, $username, $phone, $address, $totalMoney)
    {

        $query = "INSERT INTO " . $this->table . " (user,username,phone,address,totalMoney) VALUES (:user,:username,:phone,:address,:totalMoney)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':totalMoney', $totalMoney);
        if (
            $stmt->execute()
        ) {
            // Lấy ID vừa tạo
            $lastInsertId = $this->conn->lastInsertId();
            return $lastInsertId;
        } else {
            return false;
        }
    }

    public function insertOrderPro($orderId, $product, $quantity, $price, $colorName, $colorCode, $totalMoney)
    {
        $query = "INSERT INTO " . $this->tableChild . " (orderId,product,quantity,price,colorName,colorCode,totalMoney) VALUES (:orderId,:product,:quantity,:price,:colorName,:colorCode,:totalMoney)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':orderId', $orderId);
        $stmt->bindParam(':product', $product);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':colorName', $colorName);
        $stmt->bindParam(':colorCode', $colorCode);
        $stmt->bindParam(':totalMoney', $totalMoney);
        return $stmt->execute();
    }

    public function listAll($status)
    {
        $query = "SELECT *,orders.username as name,orders.id as id,orders.createdAt as createdAt from {$this->table} JOIN user ON user.id = orders.user where orders.status = :status ORDER BY orders.createdAt DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($id)
    {
        $query = "SELECT * , user.username as name,orders.username as username,orders.createdAt as createdAt
                FROM {$this->table} JOIN user ON user.id = orders.user WHERE orders.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePay($id)
    {
        $query = "UPDATE {$this->table} SET isPay = 1 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        // return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateStatus($id, $status)
    {
        $query = "UPDATE {$this->table} SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
    }

    public function getListOrderPro($id)
    {
        $query = "SELECT * 
                FROM {$this->tableChild} JOIN product ON product.id = orderPro.product where orderId = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteOne($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function listOrderPurchaseS($user, $status)
    {
        $query = "SELECT *,orders.id as id,orders.username as name,orders.id as id,orders.createdAt as createdAt from {$this->table} JOIN user ON user.id = orders.user where orders.status = :status AND orders.user = :user ORDER BY orders.createdAt DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':user', $user);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function orderProById($id)
    {
        $query = "SELECT * 
                FROM {$this->tableChild} JOIN product ON product.id = orderPro.product where id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
