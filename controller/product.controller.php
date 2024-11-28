<?php
include "./model/product.model.php";

class ProductController
{
    private $model;
    private $category;

    public function __construct()
    {
        $this->model = new ProductModel();
        $this->category = new CategoryModel();
    }

    public function index()
    {
        if (isset($_POST['btn-product-delete'])) {
            $id = $_POST['btn-product-delete'];
            $this->model->deleteOne($id, 1);
            echo '<script>window.location="index.php?layout=admin"</script>';
        }
        $listData = $this->model->listAll(0);
        include 'view/admin/pages/product.php';
    }

    public function indexDelete()
    {
        if (isset($_POST['btn-product-delete'])) {
            $id = $_POST['btn-product-delete'];
            $this->model->deleteOne($id, 0);
            echo '<script>window.location="index.php?layout=admin&page=deleteProduct"</script>';
        }
        $listData = $this->model->listAll(1);
        include 'view/admin/pages/productDelete.php';
    }

    public function addView()
    {
        if (isset($_POST['btn-product-post'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $cate = $_POST['cate'];
            $image = $_FILES['image'];
            $description = $_POST['description'];

            $image_name = time() . $image['name'];

            move_uploaded_file($image['tmp_name'], "./uploads/" . $image_name);
            $result = $this->model->insert($name, $price, $quantity, $description, $image_name, $cate);
            if ($result) {
                echo '<script>window.location="index.php?layout=admin"</script>';
            }
        }

        $listCate = $this->category->listAll();
        include 'view/admin/pages/productAdd.php';
    }

    public function updateView()
    {
        if (isset($_POST['btn-product-update'])) {
            $id = $_GET['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $imageOld = $_POST['imageOld'];
            $cate = $_POST['cate'];
            $image = $_FILES['image'];
            $description = $_POST['description'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageOld = time() . $image['name'];
                move_uploaded_file($image['tmp_name'], "./uploads/" . $imageOld);
            }

            $this->model->update($id, $name, $price, $quantity, $description, $imageOld, $cate);
            echo '<script>window.location="index.php?layout=admin"</script>';
        }

        $id = $_GET['id'] ?? null;
        $dataPro = $id ? $this->model->getOne($id) : null;
        if (!$dataPro) { // Kiểm tra nếu giá trị là null
            echo '<script>alert("Không có sản phẩm nào")</script>';
            echo '<script>window.location="index.php?layout=admin"</script>';
        }
        $listCate = $this->category->listAll();
        include 'view/admin/pages/productUpdate.php';
    }
}
