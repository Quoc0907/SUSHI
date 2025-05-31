<?php
$config = require 'config.php';
$baseURL = $config['baseURL'];
?>

<?php include './App/Views/Layout/homeheader.php'; ?>

<style>
    body {
        background: linear-gradient(to right, #ffecd2, #fcb69f);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-container {
        max-width: 500px;
        background-color: #fff;
        margin: 60px auto;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 0.8s ease;
    }

    .login-container h2 {
        color: #e74c3c;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-primary {
        background-color: #e74c3c;
        border: none;
        border-radius: 10px;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #c0392b;
    }

    .alert-danger {
        border-radius: 10px;
    }

    .text-center a {
        color: #2980b9;
        font-weight: bold;
        text-decoration: none;
    }

    .text-center a:hover {
        text-decoration: underline;
    }

    @keyframes fadeInUp {
        0% {
            transform: translateY(20px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>

<div class="container">
    <div class="login-container">
        <h2 class="text-center">🔐 Đăng nhập vào Sushi SaKuRa</h2>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form action="/PTITCNTT2402/Shopsushi1/User/login" method="POST">
            <div class="mb-3">
                <label><strong>👤 Tên đăng nhập</strong></label>
                <input type="text" name="username" class="form-control" placeholder="Nhập tên đăng nhập..." required />
            </div>
            <div class="mb-3">
                <label><strong>🔒 Mật khẩu</strong></label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu..." required />
            </div>
            <button type="submit" class="btn btn-primary w-100">🚀 Đăng nhập</button>
        </form>

        <div class="text-center mt-3">
            Chưa có tài khoản? 👉 <a href="<?= $baseURL ?>user/register">Đăng ký ngay</a>
        </div>
    </div>
</div>

<?php include './App/Views/Layout/homefooter.php'; ?>
