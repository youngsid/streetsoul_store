<?php


class CartController
{
    private $model;

    public function __construct()
    {
        $this->model = new CartModel();
    }

    public function index()
    {


        if (isset($_POST['btn-update-up'])) {
            $quantity = $_POST['quantity'];
            $id = $_POST['btn-update-up'];
            $this->model->update($id, $quantity + 1);
        }

        if (isset($_POST['btn-update-down'])) {
            $quantity = $_POST['quantity'];
            $id = $_POST['btn-update-down'];
            if ($quantity == 1) {
                return;
            }
            $this->model->update($id, $quantity - 1);
        }

        if (isset($_POST['btn-delete-cate'])) {
            $id = $_POST['btn-delete-cate'];
            $this->model->deleteOne($id);
            echo '<script>window.location="index.php?page=cart"</script>';
        }
        $listData = $this->model->listAll($_SESSION['user']['id']);
        $totalMoney = 0;
        foreach ($listData as $index => $data) {
            $totalMoney += $data['quantity'] * $data['price'];
        }
        include 'view/client/pages/cart.php';
    }


    public function findById($id)
    {
        return $this->model->getOne($id);
    }
}
