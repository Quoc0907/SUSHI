<?php
require_once __DIR__ .'/../Model/ProductModel.php';
class PopularController
{
    public function index()
    {
        $product = new ProductModel();
        $productlist = $product->getAllProducts();
        require_once __DIR__ . '/../Views/Popular/index.php';
    }

}