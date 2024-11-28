<?php


class OrderController
{
    private $model;
    private $cart;

    public function __construct()
    {
        $this->cart = new CartModel();
        $this->model = new OrderModel();
    }

    public function index()
    {


        $listData = $this->cart->listAll($_SESSION['user']['id']);
        $totalMoney = 0;
        foreach ($listData as $index => $data) {
            $totalMoney += $data['quantity'] * $data['price'];
        }
        if (isset($_POST['btn-buy-order'])) {
            $payBuy = $_POST['pay-buy'];
            $username = $_POST['username'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];


            $idOrder = $this->model->insert($_SESSION['user']['id'], $username, $phone, $address, $totalMoney + 10000);

            if ($idOrder) {
                $totalOrder = 0;
                foreach ($listData as $pro) {
                    $totalOrder += $pro['price'] * $pro['quantity'];
                    $totalPro = $pro['price'] * $pro['quantity'];
                    $this->model->insertOrderPro($idOrder, $pro['product'], $pro['quantity'], $pro['price'], $pro['colorName'], $pro['code'], $totalPro);
                }

                if ($payBuy == 1) {
                    echo $idOrder;
                    // $url = getUrlPayVnpay($totalOrder + 10000,$_GET['idCart'],$idOrder);

                    $url = payMoMo($totalOrder + 10000, $_SESSION['user']['id'], $idOrder);
                    if ($url) {
                        echo "<script>window.location = '$url'</script>";
                    }
                } else {
                    $this->cart->deleteMany($_SESSION['user']['id']);
                    echo "<script>window.location = 'index.php?page=orderSuccess'</script>";
                }
            } else {
                echo "<script>alert('Tạo đơn hàng thất bại');</script>";
            }
        }
        include 'view/client/pages/order.php';
    }

    public function coming()
    {
        if (isset($_GET['resultCode'])) {
            if ($_GET['resultCode'] == 0) {
                $this->cart->deleteMany($_SESSION['user']['id']);
                $this->model->updatePay($_GET['idOrder']);
                echo "<script>window.location = 'index.php?page=orderSuccess'</script>";
            } else {
                $this->cart->deleteOne($_GET['idOrder']);
                echo "<script>window.location = 'index.php?page=shop'</script>";
            }
        }
        include "view/client/pages/comming.php";
    }

    public function orderListAdmin()
    {
        $listData = $this->model->listAll(0);
        include "view/admin/pages/order/index.php";

        if (isset($_POST['btn-ship-order'])) {
            $idOrder = $_POST['btn-ship-order'];
            $this->model->updateStatus($idOrder, 1);
            echo "<script>window.location = 'index.php?layout=admin&page=orders'</script>";
        }
    }

    public function orderShippingAdmin()
    {
        $listData = $this->model->listAll(1);
        include "view/admin/pages/order/shipOrder.php";

        if (isset($_POST['btn-ship-order'])) {
            $idOrder = $_POST['btn-ship-order'];
            $this->model->updateStatus($idOrder, 2);
            echo "<script>window.location = 'index.php?layout=admin&page=orders'</script>";
        }
    }

    public function orderSuccessAdmin()
    {
        $listData = $this->model->listAll(2);
        include "view/admin/pages/order/successOrder.php";
    }

    public function orderDetail()
    {
        $id = $_GET['id'];

        if (!isset($id)) {
            echo "<script>window.location = 'index.php?layout=admin&page=orders'</script>";
        }
        $orderDetail = $this->model->getOne($id);
        $listOrderPro = $this->model->getListOrderPro($id);
        include "view/admin/pages/order/orderDetail.php";
    }

    public function orderPurchase($status)
    {
        if (isset($_POST['btn-success'])) {
            $idOrder = $_POST['btn-success'];
            $this->model->updateStatus($idOrder, 2);
        }
        $listOrder = $this->model->listOrderPurchaseS($_SESSION['user']['id'], $status);
        include "./view/client/pages/orderUser.php";
    }
}
