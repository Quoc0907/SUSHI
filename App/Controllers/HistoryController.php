<?php
require_once __DIR__ . '/../Model/ProductModel.php';
require_once __DIR__ . '/../Model/OrderModel.php';

class HistoryController
{
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Nếu chưa đăng nhập
        if (!isset($_SESSION['user_id'])) {
            $config = require __DIR__ . '/../../config.php';
            header("Location: " . $config['baseURL'] . "user/login");
            exit;
        }

        $orderModel = new OrderModel();
        // ✅ Gọi hàm đã có đầy đủ chi tiết đơn hàng
        $orders = $orderModel->getOrdersWithItemsByUserId($_SESSION['user_id']);

        require_once __DIR__ . '/../Views/History/index.php';
    }
}
