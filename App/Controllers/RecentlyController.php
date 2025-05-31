<?php 
require_once __DIR__ . '/../Model/ProductModel.php';
class RecentlyController{
    public function index(){
    $productModel = new ProductModel();
    $recentlySold = $productModel->getRecentlyAddedProducts();
        require_once __DIR__ . '/../Views/Recently/index.php';
    }
}