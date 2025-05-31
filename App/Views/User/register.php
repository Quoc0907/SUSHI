<?php
$config = require 'config.php';
$baseURL = $config['baseURL'];
?>

<?php include './App/Views/Layout/homeHeader.php'; ?>

<style>
    body {
        background: linear-gradient(to right, #d4fc79, #96e6a1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .register-container {
        max-width: 500px;
        background-color: #fff;
        margin: 60px auto;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 0.8s ease;
    }

    .register-container h2 {
        color:rgb(174, 39, 39);
        font-weight: bold;
        margin-bottom: 30px;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-success {
        background-color: #27ae60;
        border: none;
        border-radius: 10px;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .btn-success:hover {
        background-color: #219150;
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
    <div class="register-container">
        <h2 class="text-center">📝 Đăng ký tài khoản mới</h2>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form action="<?= $baseURL ?>user/register" method="POST">
            <div class="mb-3">
                <label><strong>👤 Họ tên</strong></label>
                <input type="text" name="fullname" class="form-control" placeholder="Nhập họ tên đầy đủ..." required />
            </div>
            <div class="mb-3">
                <label><strong>👥 Tên đăng nhập</strong></label>
                <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập..." required />
            </div>
            <div class="mb-3">
                <label><strong>🔒 Mật khẩu</strong></label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu..." required />
            </div>
            <button type="submit" class="btn btn-success w-100">🚀 Đăng ký</button>
        </form>

        <div class="text-center mt-3">
            Đã có tài khoản? 👉 <a href="<?= $baseURL ?>user/login">Đăng nhập ngay</a>
        </div>
    </div>
</div>

<?php include './App/Views/Layout/homeFooter.php'; ?>
