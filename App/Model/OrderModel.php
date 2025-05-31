<?php
require_once __DIR__ . '/../../Core/database.php';

class OrderModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function insertOrder($order_date, $user_id, $total_amount)
    {
        $sql = "INSERT INTO tblorder (order_date, user_id, total_amount, status) VALUES (?, ?, ?, 'Đặt Hàng')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$order_date, $user_id, $total_amount]);
        return $this->db->lastInsertId();
    }

    public function insertOrderItem($orderId, $productId, $quantity, $price)
    {
        $sql = "INSERT INTO tblorderdetails (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$orderId, $productId, $quantity, $price]);
    }

    public function updateOrderTotal($orderId, $totalAmount)
    {
        $sql = "UPDATE tblorder SET total_amount = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$totalAmount, $orderId]);
    }

    public function getOrdersByUserId($userId)
    {
        $sql = "SELECT * FROM tblorder WHERE user_id = ? ORDER BY order_date DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

public function getOrdersWithItemsByUserId($userId)
{
    $sqlOrders = "SELECT * FROM tblorder WHERE user_id = ? ORDER BY order_date DESC";
    $stmtOrders = $this->db->prepare($sqlOrders);
    $stmtOrders->execute([$userId]);
    $orders = $stmtOrders->fetchAll(PDO::FETCH_ASSOC);

    foreach ($orders as &$order) {
        $sqlItems = "SELECT p.name as product_name, od.quantity, od.price
                     FROM tblorderdetails od
                     JOIN tblproducts p ON od.product_id = p.id
                     WHERE od.order_id = ?";
        $stmtItems = $this->db->prepare($sqlItems);
        $stmtItems->execute([$order['id']]);
        $order['items'] = $stmtItems->fetchAll(PDO::FETCH_ASSOC);
    }

    return $orders;
}


    public function updateStatus($orderId, $newStatus)
    {
        $sql = "UPDATE tblorder SET status = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$newStatus, $orderId]);
    }

    public function getOrderCountPerDay($days = 7)
    {
        $stmt = $this->db->prepare("
            SELECT DATE(order_date) as order_day, COUNT(*) as order_count
            FROM tblorder
            WHERE order_date >= DATE_SUB(CURDATE(), INTERVAL :days DAY)
            GROUP BY order_day
            ORDER BY order_day ASC
        ");
        $stmt->bindValue(':days', $days, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllOrdersWithUser()
    {
        $sql = "SELECT o.*, u.username
                FROM tblorder o
                JOIN tblusers u ON o.user_id = u.id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
