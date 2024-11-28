<?php
include "./model/category.model.php";


class CategoryController
{
    private $model;

    public function __construct()
    {
        $this->model = new CategoryModel();
    }

    public function index()
    {
        if (isset($_POST['btn-post-cate'])) {
            $name = $_POST['name'];
            $result = $this->model->insert($name);
            if ($result) {
                echo '<script>window.location="index.php?layout=admin&page=category"</script>';
            }
        }

        if (isset($_POST['btn-update-cate'])) {
            $name = $_POST['nameUpdate'];
            $id = $_GET['id'];
            $this->model->update($id, $name);
            echo '<script>window.location="index.php?layout=admin&page=category"</script>';
        }

        if (isset($_POST['btn-delete-cate'])) {
            $id = $_POST['btn-delete-cate'];
            $this->model->deleteOne($id);
            echo '<script>window.location="index.php?layout=admin&page=category"</script>';
        }

        $listData = $this->model->listAll();

        $cateUpdate = isset($_GET['id']) ? $this->findById($_GET['id']) : null;
        include 'view/admin/pages/category.php';
    }


    public function findById($id)
    {
        return $this->model->getOne($id);
    }
}
