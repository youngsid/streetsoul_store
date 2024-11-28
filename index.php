<?php
session_start();
?>
<?php
$_SESSION["favcolor"] = "green";


$session_status = session_status();


include "./config/db.php";
include "./config/func.php";
include "./config/momo.php";
include "./model/order.model.php";
include "./controller/home.controller.php";
include "./controller/shop.controller.php";
include "./controller/contact.controller.php";
include "./controller/auth.controller.php";
include "./controller/category.controller.php";
include "./controller/color.controller.php";
include "./controller/user.controller.php";
include "./controller/product.controller.php";
include "./controller/productDetail.controller.php";
include "./controller/cart.controller.php";
include "./controller/order.controller.php";
$db = new Database();
$db->pdo_get_connection();


$sessionUserId = null;
if (isset($_SESSION['user'])) {
    $sessionUserId = $_SESSION['user'];
}

$layout = $_GET['layout'] ?? '';
$page = $_GET['page'] ?? '';

switch ($layout) {
    case "":
        include './view/client/layout/header.php';
        switch ($page) {
            case '':
                $homeController = new HomeController();
                $homeController->index();
                break;
            case 'shop':
                $shopController = new ShopController();
                $shopController->index();
                break;
            case 'contact':
                $contactController = new ContactController();
                $contactController->index();
                break;

            case 'productDetail':
                $productDetail = new ProductDetailController();
                $productDetail->index();
                break;
            case 'cart':
                if (!isset($sessionUserId['id'])) {
                    echo "<script>window.location = 'index.php?page=login'</script>";
                }
                $productDetail = new CartController();
                $productDetail->index();
                break;
            case 'order':
                $productDetail = new OrderController();
                $productDetail->index();
                break;
            case 'coming':
                $productDetail = new OrderController();
                $productDetail->coming();
                break;
            case 'orderSuccess':
                include "view/client/pages/success.php";
                break;
            case 'purchases':
                $productDetail = new OrderController();
                $productDetail->orderPurchase(0);
                break;
            case 'purchasesShip':
                $productDetail = new OrderController();
                $productDetail->orderPurchase(1);
                break;
            case 'purchasesSuccess':
                $productDetail = new OrderController();
                $productDetail->orderPurchase(2);
                break;
            case 'login':
                if (isset($sessionUserId['id'])) {
                    echo "<script>window.location = 'index.php'</script>";
                }
                $contactController = new AuthController();
                $contactController->login();
                break;
            case 'register':
                if (isset($sessionUserId['id'])) {
                    echo "<script>window.location = 'index.php'</script>";
                }
                $contactController = new AuthController();
                $contactController->register();
                break;
            case 'logout':
                if (isset($sessionUserId['id'])) {
                    echo "<script>window.location = 'index.php'</script>";
                }
                $contactController = new AuthController();
                $contactController->logout();
                break;
            default:
                $homeController = new HomeController();
                $homeController->index();
                break;
        }
        include './view/client/layout/footer.php';
        break;
    case "admin":
        if (!isset($sessionUserId) || $sessionUserId['role'] !== 0) {
            header("Location:index.php");
        }
        include './view/admin/layout/sidebar.php';
        switch ($page) {
            case 'category':
                $categoryController = new CategoryController();
                $categoryController->index();
                break;
            case 'color':
                $categoryController = new ColorController();
                $categoryController->index();
                break;
            case 'orders':
                $categoryController = new OrderController();
                $categoryController->orderListAdmin();
                break;
            case 'shipping':
                $categoryController = new OrderController();
                $categoryController->orderShippingAdmin();
                break;
            case 'success':
                $categoryController = new OrderController();
                $categoryController->orderSuccessAdmin();
                break;
            case 'orderDetail':
                $categoryController = new OrderController();
                $categoryController->orderDetail();
                break;
            case 'user':
                $categoryController = new UserController();
                $categoryController->index();
                break;
            case 'addProduct':
                $categoryController = new ProductController();
                $categoryController->addView();
                break;
            case 'updateProduct':
                $categoryController = new ProductController();
                $categoryController->updateView();
                break;
            case 'deleteProduct':
                $categoryController = new ProductController();
                $categoryController->indexDelete();
                break;
            case '':
                $categoryController = new ProductController();
                $categoryController->index();
                break;
        }
}
