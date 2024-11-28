<?php
include "./model/cart.model.php";

class ProductDetailController
{
    private $model;
    private $color;
    private $cart;

    public function __construct()
    {
        $this->model = new ProductModel();
        $this->color = new ColorModel();
        $this->cart = new CartModel();
    }

    public function index()
    {
        $id = $_GET['id'];
        if (isset($id)) {
            $listColor = $this->color->listAll();
            $product = $this->model->getOne($id);
            $listOther = $this->model->listAllOther($id);
            if (!isset($product)) header("Location:index.php");
            include 'view/client/pages/productDetail.php';
        } else {
            header("Location:index.php");
        }

        if (isset($_POST['btn-to-cart'])) {
            if (!isset($_SESSION['user']['id'])) {
                echo '<script>window.location="index.php?page=login"</script>';
                return;
            }

            if (!isset($_POST['color'])) {
                echo "<script>handlerToast('error','Bạn chưa chọn màu')</script>";
                return;
            }

            $result = $this->cart->insert(
                $id,
                $_SESSION['user']['id'],
                $_POST['color']
            );

            echo json_encode($result);

            if (isset($result)) {
                echo "<script>handlerToast('success','Thêm giỏ hàng thành công')</script>";
            }
        }
    }

    public function addToCart($color) {}
}
