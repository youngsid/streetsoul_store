<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script
        type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>


    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <!-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script> -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/admin.css">


</head>

<body>
    <div class="main">
        <div class="side-bar">
            <div class="side-bar-logo">
                <a href="index.php" class="flex items-center bg-white text-black rounded-md justify-center">
                    <img src="img/logofivemenxoaphong.png" alt="" width="100px">
                </a>
            </div>
            <div class="side-bar-menu">
                <div class="side-bar-list">

                    <a href="index.php?layout=admin">
                        <button data-type="product" class="sideBarButton">
                            <i class="fa-solid fa-box-archive"></i> Sản phẩm
                        </button>
                    </a>
                    <a href="index.php?layout=admin&page=addProduct">
                        <button data-type="newProduct" class="sideBarButton">
                            <i class="fa-solid fa-plus"></i> Thêm mới
                        </button>
                    </a>
                    <!--  -->

                    <a href="index.php?layout=admin&page=orders">
                        <button data-type="user" class="sideBarButton">
                            <i class="fa-solid fa-cart-plus"></i> Đơn hàng mới
                        </button>
                    </a>
                    <a href="index.php?layout=admin&page=shipping">
                        <button data-type="user" class="sideBarButton">
                            <i class="fa-solid fa-truck-fast"></i> Giao hàng
                        </button>
                    </a>
                    <a href="index.php?layout=admin&page=success">
                        <button data-type="user" class="sideBarButton">
                            <i class="fa-solid fa-box"></i> Hoàn thành
                        </button>
                    </a>
                    <!--  -->

                    <!--  -->
                    <a href="index.php?layout=admin&page=user">
                        <button data-type="user" class="sideBarButton">
                            <i class="fa-regular fa-user"></i> Người dùng
                        </button>
                    </a>

                    <a href="index.php?layout=admin&page=category">
                        <button data-type="category" class="sideBarButton">
                            <i class="fa-regular fa-square-minus"></i>Danh mục
                        </button>
                    </a>
                    <a href="index.php?layout=admin&page=color">
                        <button data-type="color" class="sideBarButton">
                            <i class="fa-solid fa-palette"></i> Màu
                        </button>
                    </a>

                </div>

                <a
                    class="btn btn-danger btn-sm logout"
                    style="width: 100%"
                    href="index.php?page=logout"><i class="fa-solid fa-arrow-right-to-bracket"></i> Đăng xuất</a>

            </div>
        </div>
        <div class="box-content">