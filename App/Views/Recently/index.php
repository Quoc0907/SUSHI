<?php
include_once __DIR__ . "/../Layout/homeheader.php";
$config = require 'config.php';
$baseURL = $config['baseURL'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm Sushi gần đây</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff8f0;
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }

        h2 {
            text-align: center;
            color: #e63946;
            margin-bottom: 40px;
            font-size: 2.5em;
        }

        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .product-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 20px;
            width: 250px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .product-card h3 {
            font-size: 1.3em;
            color: #333;
            margin: 10px 0 5px;
        }

        .product-card p {
            font-size: 0.95em;
            color: #666;
            margin: 5px 0 15px;
            min-height: 48px;
        }

        .product-card strong {
            color: #e76f51;
            font-size: 1.2em;
        }

        @media (max-width: 768px) {
            .product-card {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <main>
        <h2>Sản phẩm Sushi gần đây</h2>
        <div class="product-grid">
            <?php foreach ($recentlySold as $product): ?>
                <div class="product-card">
                    <img src="<?= $baseURL ?>assets/images/<?= htmlspecialchars($product['image']) ?>" alt="Product Image">
                    <h3><?= htmlspecialchars($product['name']) ?></h3>
                    <p><?= htmlspecialchars($product['description']) ?></p>
                    <strong><?= number_format($product['price'], 0, ',', '.') ?> VND</strong>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>

<?php require __DIR__ . "/../Layout/homefooter.php"; ?>
