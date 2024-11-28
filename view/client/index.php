<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Danh sách các trang hợp lệ
$allowed_pages = [
    '' => './view/client/pages/home.php',
    'shop' => './view/client/pages/shop.php',
    'contact' => './view/client/pages/contact.php',
    'login' => './view/client/pages/login.php',
    'register' => './view/client/pages/register.php',
];

include './view/client/layout/header.php';
if (isset($allowed_pages[$page])) {
    include $allowed_pages[$page];
} else {
    include './view/client/pages/home.php';
}
include './view/client/layout/footer.php';
