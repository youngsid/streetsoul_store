<?php
class HomeController
{
    private $product;

    public function __construct()
    {
        $this->product = new ProductModel();
    }
    public function index()
    {
        $dataPro = $this->product->listAll(0);
        include 'view/client/pages/home.php';
    }
}
