<?php
include "./model/color.model.php";


class ColorController
{
    private $model;

    public function __construct()
    {
        $this->model = new ColorModel();
    }

    public function index()
    {
        if (isset($_POST['btn-color-post'])) {
            $name = $_POST['name'];
            $code = $_POST['code'];
            $result = $this->model->insert($name, $code);
            if ($result) {
                echo '<script>window.location="index.php?layout=admin&page=color"</script>';
            }
        }

        if (isset($_POST['btn-update-color'])) {
            $name = $_POST['name'];
            $code = $_POST['code'];
            $id = $_GET['id'];
            $this->model->update($id, $name, $code);
            echo '<script>window.location="index.php?layout=admin&page=color"</script>';
        }

        if (isset($_POST['btn-delete-color'])) {
            $id = $_POST['btn-delete-color'];
            $this->model->deleteOne($id);
            echo '<script>window.location="index.php?layout=admin&page=color"</script>';
        }

        $listData = $this->model->listAll();

        $colorUpdate = isset($_GET['id']) ? $this->findById($_GET['id']) : null;
        include 'view/admin/pages/color.php';
    }

    public function findById($id)
    {
        return $this->model->getOne($id);
    }
}
