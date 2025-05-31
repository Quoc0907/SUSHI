<?php
$config = require "config.php";   // Tải mảng cấu hình từ file config.php
$baseURL = $config['baseURL'];    // Lấy giá trị 'baseURL' từ mảng cấu hình
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Chỉ khởi động session nếu chưa có session nào chạy
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Sushi</title>
    <style>
    /* Tổng thể */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #fff8f2;
        color: #333;
        margin: 0;
        padding: 0;
    }

    /* Thanh điều hướng */
    .navbar {
        background-color: #ffffff !important;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .navbar-brand {
        font-size: 1.8em;
        font-weight: bold;
        color: #ff6b6b !important;
        transition: transform 0.3s ease;
    }

    .navbar-brand:hover {
        transform: scale(1.1);
    }

    .nav-link {
        color: #333 !important;
        font-weight: 600;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .nav-link:hover {
        color: #ff6b6b !important;
        transform: translateY(-2px);
    }

    /* Phần chính (Hero section) */
    .main {
        text-align: center;
        padding: 80px 20px;
        background: linear-gradient(to right, #fff8f2, #ffe4e1);
    }

    .main h1 {
        font-size: 3.5em;
        color: #ff6b6b;
        margin-bottom: 20px;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
    }

    .main p {
        font-size: 1.3em;
        max-width: 600px;
        margin: 0 auto 30px;
        line-height: 1.6;
    }

    /* Nút */
    .button,
    .btn-danger {
        background-color: #ff6b6b;
        border: none;
        padding: 12px 30px;
        font-size: 1.1em;
        font-weight: bold;
        border-radius: 30px;
        color: #fff;
        box-shadow: 0 4px 10px rgba(255,107,107,0.3);
        transition: all 0.3s ease;
    }

    .button:hover,
    .btn-danger:hover {
        background-color: #e64949;
        transform: scale(1.05);
    }

    /* Ảnh sushi */
    .sushi-image {
        margin-top: 40px;
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    /* Cart badge */
    .badge.bg-danger {
        font-size: 0.9em;
        padding: 5px 10px;
        border-radius: 10px;
        margin-left: 4px;
        vertical-align: top;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .main h1 {
            font-size: 2.5em;
        }

        .main p {
            font-size: 1.1em;
        }
    }
</style>

</head>
<body class="bg-light">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">🍣🍥Sushi SaKuRa</a>
        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" >
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/PTITCNTT2402/shopsushi1/Home/index">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/PTITCNTT2402/Shopsushi1/Popular/index">Popular</a></li>
                    <li class="nav-item"><a class="nav-link" href="/PTITCNTT2402/Shopsushi1/Recently/index">Recently</a></li>
                    <li class="nav-item"><a class="nav-link" href="/PTITCNTT2402/Shopsushi1/History/index">History</a></li>
                    <li class="nav-item"><a class="nav-link" href="/PTITCNTT2402/Shopsushi1/User/login">Login</a></li>
                     <li class="nav-item"><a class="nav-link" href="/PTITCNTT2402/Shopsushi1/User/register">register</a></li>
                     <li class="nav-item"><a class="nav-link" href="<?= $baseURL .'user/contact'?>">Liên hệ</a></li>                   
                    <li class="nav-item">
          <a class="nav-link" href="/PTITCNTT2402/Shopsushi1/Cart/index">
            🛒 Cart <span class="badge bg-danger"><?php
                    if (!isset($_SESSION['cart'])) {
                       echo '0';
                    }
                    else
                    {
                       echo sizeof($_SESSION['cart']);
                    }
                ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section
    <div class="container text-center my-5">
        <h1 class="display-4">Enjoy Delicious 🥢 Sushi Food</h1>
        <p class="lead">Enjoy a good dinner with the best dishes in the restaurant and improve your day.</p>
        <a href="/PTITCNTT2402/Shopsushi1/Views/History/index.php" class="btn btn-danger btn-lg">Order Now</a>
    </div> -->
    

    