<?php
require_once __DIR__ . "/../Model/UserModel.php";
require_once __DIR__ . "/../../Core/PHPMailer/Mailer.php";

class UserController
{
    public function index()
    {
        include __DIR__ . '/../Views/User/index.php';
    }

    public function create()
    {
        echo "U in method Create of UserController Controller";
    }

    public function register()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $error = '';
        $config = require './config.php';
        $baseURL = $config['baseURL'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash mật khẩu

            $userModel = new UserModel();
            $userId = $userModel->createUser($fullname, $username, $password);

            $_SESSION['user_id'] = $userId;
            $_SESSION['username'] = $username;

            header("Location: " . $baseURL . "home/index"); // ✅ KHÔNG về cart/index nữa
            exit();
        }

        include './App/Views/User/register.php';
    }

    public function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $pdo = new PDO("mysql:host=localhost;dbname=shop_sushi", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT * FROM tblusers WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                $config = require 'config.php';
                $baseURL = $config['baseURL'];
                header("Location: " . $baseURL . "home/index"); // ✅ KHÔNG về cart/index nữa
                exit();
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
            }
        }

        include './App/Views/User/login.php';
    }

    public function contact()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userName = htmlspecialchars($_POST['name']);
            $userEmail = htmlspecialchars($_POST['email']);
            $subject = htmlspecialchars($_POST['subject']);
            $message = htmlspecialchars($_POST['message']);

            $adminEmail = "90zuka09@gmail.com";
            $emailSubject = "Liên hệ từ $userEmail";
            $emailBody = "<h3>Thông tin liên hệ</h3>
                          <p><strong>Tên:</strong> $userName</p>
                          <p><strong>Email:</strong> $userEmail</p>
                          <p><strong>Tiêu đề:</strong> $subject</p>
                          <p><strong>Nội dung:</strong><br>$message</p>";

            if (Mailer::sendMail($adminEmail, $emailSubject, $emailBody)) {
                $_SESSION['contact_success'] = "Cảm ơn bạn đã liên hệ!";
            } else {
                $_SESSION['contact_error'] = "Gửi email thất bại. Vui lòng thử lại!";
            }

            $config = require 'config.php';
            $baseURL = $config['baseURL'];
            header("Location: " . $baseURL . 'user/contact');
            exit();
        }

        include './App/Views/User/contact.php';
    }
}
