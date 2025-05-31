<?php
require_once __DIR__ . '/../Model/AdminModel.php';
require_once __DIR__ . '/../Model/OrderModel.php';

class AdminController
{
    public function index()
    {
        include __DIR__ . '/../Views/Admin/index.php';
    }
    
public function orderManagement()
    {
        require_once __DIR__ . '/../Model/OrderModel.php';
        $orderModel = new OrderModel();
        $orders = $orderModel->getAllOrdersWithUser();
        $config = require __DIR__ . '/../../config.php';
        $baseURL = $config['baseURL'];
        include __DIR__ . '/../Views/Admin/ordermanagement.php';
    }
    public function report()
    {
        require_once __DIR__ . '/../Model/OrderModel.php';
        $orderModel = new OrderModel();
        $ordersPerDay = $orderModel->getOrderCountPerDay(7); // Truyền vào index view

        include __DIR__ . '/../Views/Admin/report.php';
      
    }

}