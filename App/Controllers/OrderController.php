<?php
require_once __DIR__ . '/../Model/OrderModel.php';
require_once __DIR__ . '/../Model/ProductModel.php';
class OrderController
{
   public function checkout()
{
    if (session_status()===PHP_SESSION_NONE) {
        session_start();
    }

    $config = require 'config.php';            
    $baseURL = $config['baseURL'];           

    // Nếu người dùng chưa đăng nhập
    if (!isset($_SESSION['user_id'])) {   
        header('Location:'. $baseURL . 'user/login');
        exit();
    }

    // Nếu giỏ hàng trống
    if (empty($_SESSION['cart'])) {
        header('Location:'. $baseURL . 'cart');
        exit();
    }

    // Tạo đơn hàng mới
    $orderModel = new OrderModel();
    $productModel = new ProductModel();
    $now = (new DateTime())->format('Y-m-d H:i:s');
    $total = 0;

    // Bước 1: Tạo đơn hàng với total = 0 trước
    $orderId = $orderModel->insertOrder($now, $_SESSION['user_id'], 0);

    // Bước 2: Thêm từng item trong giỏ hàng vào chi tiết đơn hàng
    foreach ($_SESSION['cart'] as $item) {
        $product = $productModel->getProductById($item['product_id']);
        $itemTotal = $item['quantity'] * $product['price'];
        $total += $itemTotal;

        $orderModel->insertOrderItem($orderId, $item['product_id'], $item['quantity'], $product['price']);
    }

    // Bước 3: Cập nhật lại tổng tiền cho đơn hàng
    $orderModel->updateOrderTotal($orderId, $total);

        // 4. Xoa gio hang
        unset($_SESSION['cart']);        
        
        include __DIR__ . '/../Views/Order/checkout.php';
    }
    public function history()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['user_id'])) {
        $config = require __DIR__ . '/../../config.php';
        header("Location: " . $config['baseURL'] . "user/login");
        exit;
    }

    $orderModel = new OrderModel();
    // ✔ Gọi đúng hàm có chi tiết sản phẩm
    $orders = $orderModel->getOrdersWithItemsByUserId($_SESSION['user_id']);

    $config = require __DIR__ . '/../../config.php';
    $baseURL = $config['baseURL'];

    include __DIR__ . '/../Views/Order/history.php';
}

    public function updateStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $orderId = $_POST['order_id'];            
            $status = $_POST['status'];
            if (isset($status) && !empty($status ))
            {
                require_once __DIR__ . "/../Model/OrderModel.php";
                $orderModel = new OrderModel();
                $orderModel->updateStatus($orderId, $status);
            }
            $config = require './config.php';        
            header('Location: ' . $config['baseURL'] . 'admin/orderManagement');
            
            exit();
        }
    }
}

