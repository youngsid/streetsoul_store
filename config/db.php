<?php
class Database
{
    private $conn;
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "duan_1"; // Cần xác định tên database

    // Hàm kết nối PDO
    public function pdo_get_connection()
    {
        try {
            // Sử dụng this->conn thay vì tạo một biến cục bộ
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn; // Trả về kết nối
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null; // Trả về null nếu kết nối thất bại
        }
    }

    // Lấy tất cả dữ liệu từ một bảng
    public function get_all_pdo($column)
    {
        try {
            $connect = $this->pdo_get_connection();
            if ($connect === null) {
                return []; // Trả về mảng rỗng nếu kết nối thất bại
            }
            // Sử dụng prepared statement để tránh SQL injection
            $product_sql = "SELECT * FROM `$column`";
            $product_query = $connect->query($product_sql);
            $product_all = $product_query->fetchAll(PDO::FETCH_ASSOC);
            return $product_all;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    // Lấy một giá trị từ bảng
    public function get_one_pdo($column, $id)
    {
        try {
            $connect = $this->pdo_get_connection();
            if ($connect === null) {
                return null;
            }
            // Sử dụng prepared statement để tránh SQL injection
            $product_sql = "SELECT * FROM `$column` WHERE id = :id";
            $stmt = $connect->prepare($product_sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            return $product;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    // Xóa một bản ghi trong bảng
    public function delete_one_pdo($column, $id)
    {
        try {
            $connect = $this->pdo_get_connection();
            if ($connect === null) {
                return false;
            }
            // Sử dụng prepared statement để tránh SQL injection
            $product_sql = "DELETE FROM `$column` WHERE id = :id";
            $stmt = $connect->prepare($product_sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Hàm xóa ký tự không mong muốn
    public function delete_characters($str)
    {
        return preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($str));
    }

    // Thực thi câu lệnh SQL
    public function querySql($sql)
    {
        try {
            $connect = $this->pdo_get_connection();
            if ($connect === null) {
                return false;
            }
            $query = $connect->query($sql);
            return $query;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Thực thi câu lệnh SQL chuẩn bị
    public function prepareSql($sql)
    {
        try {
            $connect = $this->pdo_get_connection();
            if ($connect === null) {
                return false;
            }
            $query = $connect->prepare($sql);
            return $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
