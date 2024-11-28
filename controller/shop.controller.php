<?php
class ShopController
{
    private $product;
    private $category;

    public function __construct()
    {
        $this->product = new ProductModel();
        $this->category = new CategoryModel();
    }
    public function index()
    {


        $dataPro = isset($_GET['cate']) ? $this->product->listAllCate($_GET['cate']) : $this->product->listAll(0);
        $listCate = $this->category->listAll();
        include 'view/client/pages/shop.php';
    }
}
