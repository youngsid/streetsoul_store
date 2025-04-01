<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreetSoul Store</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/index.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
</head>

<body>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">

            </div>
        </div>
    </div>
    <script>
        const toastLiveExample = document.getElementById('liveToast')
        const toastBody = document.querySelector('.toast-body')
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)

        const handlerToast = (isType, message) => {
            if (isType === "success") {
                toastLiveExample.classList.remove("text-bg-danger")
                toastLiveExample.classList.add("text-bg-success")
                toastBody.textContent = message
            } else if (isType === "error") {
                toastLiveExample.classList.add("text-bg-danger")
                toastLiveExample.classList.remove("text-bg-success")
                toastBody.textContent = message
            }

            toastBootstrap.show()

        }
    </script>

    <header>
        
        <div class="container">
            <nav>
                <a href="index.php">
                    <div class="logo">
                        <img src="/uploads/logov2.png" alt="">
                    </div>
                </a>

                <div class="menu">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="index.php?page=shop">Sản phẩm</a></li>
                        <li><a href="index.php?page=contact">Giới thiệu</a></li>

                    </ul>
                    <div>

                    </div>
                </div>

                <div class="d-flex align-items-center gap-4">
                    <div class="mr-2">
                        <a href="index.php?page=cart" class="cart">
                            <i class="fa-solid fa-basket-shopping"></i></a>
                    </div>
                    <?php
                    if (isset($sessionUserId['id'])) {
                    ?>
                        <div class="dropdown">
                            <button
                                class="btn btn-outline-secondary dropdown-toggle btn-sm"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?php
                                if (isset($sessionUserId)) {
                                    echo "Hi," . $sessionUserId['username'] . "<i class='fa-regular fa-user'></i>";
                                }
                                ?>
                            </button>

                            <ul class="dropdown-menu gap-2">
                                <?php
                                if ($sessionUserId['role'] == 0) {
                                ?>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="index.php?layout=admin">Quản trị</a>
                                    </li>
                                <?php
                                }
                                ?>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="index.php?page=purchases">Đơn hàng</a>
                                </li>


                                <li>
                                    <a
                                        class="btn btn-danger btn-sm"
                                        style="width: 100%"
                                        href="index.php?page=logout">Đăng xuất</a>

                                </li>
                            </ul>
                        </div>
                    <?php
                    } else {
                    ?>
                        <a href="index.php?page=login">
                            <button
                                class="btn btn-outline-secondary btn-sm"
                                type="button">
                                Đăng nhập
                            </button>
                        </a>
                    <?php
                    }
                    ?>

                </div>
            </nav>
        </div>
    </header>
    <main>