<?php 
    require __DIR__. "/../Layout/Homeheader.php";
    $config = require 'config.php';
    $baseURL = $config['baseURL'];
?>

<?php if (isset($_SESSION['message'])): ?>
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    <?= $_SESSION['message']; unset($_SESSION['message']); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🌸 WelCome to Sushi Sakura 🌸 </title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right,rgb(255, 248, 255), #ffe4e1);
            margin: 0;
            padding: 0;
        }

        .home-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 20px 50px;
            min-height: calc(100vh - 100px); /* đảm bảo không bị "thụt" khi ít nội dung */
            text-align: center;
        }

        h1 {
            font-size: 3em;
            color: #ff6b6b;
            margin-bottom: 20px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 30px;
            max-width: 600px;
        }

        img {
            max-width: 100%;
            width: 400px;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.03);
        }

        .footer-spacer {
            height: 50px; /* để tránh sát chân trang */
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.2em;
            }

            p {
                font-size: 1em;
            }

            img {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="home-container">
        <h1>🌸 WelCome to Sushi Sakura 🌸 🍣</h1>
        <p>Chào mừng bạn đến với Sushi Sakura  điểm hẹn của những tín đồ yêu ẩm thực Nhật Bản.
Chúng tôi tự hào mang đến những món sushi tươi ngon, được chế biến từ nguyên liệu tuyển chọn, hòa quyện giữa tinh hoa truyền thống và cảm hứng hiện đại.
Từng miếng sushi là một tác phẩm tinh tế, được làm nên bởi bàn tay khéo léo của các đầu bếp lành nghề, trong không gian ấm cúng đậm chất Nhật.
Sushi Sakura không chỉ là nơi thưởng thức, mà còn là nơi lưu giữ những khoảnh khắc đẹp bên người thân yêu.</p>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUJBGW7_eph88izoSH-BKIV2fxswGEl3i6dA&s" alt="Sushi">
    </div>
    <div class="footer-spacer"></div>
</body>
</html>
