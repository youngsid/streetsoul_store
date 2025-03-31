<?php

$page = $_GET['page'] ?? 'home';

$allowed_pages = [
    'home' => 'view/client/pages/home.php',
    'shop' => 'view/client/pages/shop.php',
    'contact' => 'view/client/pages/contact.php',
    'login' => 'view/client/pages/login.php',
    'register' => 'view/client/pages/register.php',
];

include 'view/client/layout/header.php';
include $allowed_pages[$page] ?? 'view/client/pages/home.php';
include 'view/client/layout/footer.php';
// hello ae