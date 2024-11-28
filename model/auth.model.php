<?php

// include "./config/db.php";

class AuthModel
{
    private $conn;
    private $table = "user";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->pdo_get_connection();
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && $password === $user['password']) {
            return $user;
        }
        return false;
    }


    public function register($username, $email, $password)
    {
        $storedHash = trim($password);
        // $hashedPassword = password_hash($storedHash, PASSWORD_DEFAULT);
        $query = "INSERT INTO " . $this->table . " (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }
}
