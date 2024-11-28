<?php
include "./model/auth.model.php";

class AuthController
{
    private $model;

    public function __construct()
    {
        $this->model = new AuthModel();
    }
    public function login()
    {
        $error = null;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->login($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: index.php");
            } else {
                $error = "Đăng nhập thất bại";
            }
        }
        include 'view/client/pages/login.php';
    }

    public function register()
    {
        $error = null;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $username = $_POST['username'];

            $user = $this->model->register($username, $email, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: index.php");
            } else {
                $error = "Đăng nhập thất bại";
            }
        }
        include 'view/client/pages/register.php';
    }

    public function logout()
    {
        session_unset();  // Xóa tất cả session
        session_destroy();  // Hủy session
        header("Location:index.php?page=login");  // Redirect về trang login
        exit();
    }
}
