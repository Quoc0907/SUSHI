<?php
require_once __DIR__ . '/../../Core/database.php';
class ProductModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function getAllProducts()
    {
        $stmt = $this->db->prepare("SELECT * FROM tblproducts ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertProduct($name, $price, $image)
    {
        $sql = "INSERT INTO tblproducts (Name, Price, Image) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$name, $price, $image]);
    }

    public function deleteProduct($productID)
    {
        $sql = "DELETE FROM tblproducts WHERE Id= ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$productID]);
    }
    public function getProductById($id)
    {
        $sql = "SELECT * FROM tblproducts WHERE Id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getRecentlySoldProducts($limit = 9){
        $sql = "SELECT * FROM tblproducts WHERE Id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAllHistory() {
    $userId = $_SESSION['user_id'] ?? 0;

    if ($userId == 0) return [];

    $sql = "
        SELECT p.name, p.price, p.image
        FROM tblOrder o
        JOIN tblOrderDetails od ON o.id = od.order_id
        JOIN tblProducts p ON od.product_id = p.id
        WHERE o.user_id = :userId
        ORDER BY o.order_date DESC
    ";

    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $data;

    }
   public function getRecentlyAddedProducts()
       {
        $sql = "SELECT * FROM tblproducts ORDER BY catalog_id DESC LIMIT 20";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
