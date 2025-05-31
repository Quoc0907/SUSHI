<?php require __DIR__. "/../Layout/HomeHeader.php" ?>

<style>
    body {
        background-color:rgba(249, 249, 249, 0.93);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container.text-center h1.display-4 {
        color: #d43f3a; /* màu đỏ đậm bắt mắt */
        font-weight: 700;
        margin-bottom: 10px;
        text-shadow: 1px 1px 2px #aaa;
    }

    .container.text-center p.lead {
        color: #555;
        font-size: 1.2rem;
        margin-bottom: 25px;
    }

    .btn-danger.btn-lg {
        background: linear-gradient(45deg, #d43f3a, #9b2e24);
        border: none;
        font-weight: bold;
        box-shadow: 0 5px 15px rgba(212, 63, 58, 0.6);
        transition: background 0.3s ease;
    }

    .btn-danger.btn-lg:hover {
        background: linear-gradient(45deg, #9b2e24, #d43f3a);
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        background-color: #fff;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(212, 63, 58, 0.4);
    }

    .card img {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        height: 180px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .card img:hover {
        transform: scale(1.05);
    }

    .card-body h5.fw-bolder {
        color: #d43f3a;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .card-body .price {
        font-weight: 600;
        color: #333;
        font-size: 1.1rem;
        margin-bottom: 15px;
    }

    .card-footer {
        background: transparent;
        border-top: none;
        text-align: center;
    }

    .btn-primary.btn-sm {
        background: linear-gradient(45deg, #27ae60, #1e8449);
        border: none;
        font-weight: bold;
        border-radius: 12px;
        padding: 8px 20px;
        box-shadow: 0 5px 15px rgba(39, 174, 96, 0.5);
        transition: background 0.3s ease;
    }

    .btn-primary.btn-sm:hover {
        background: linear-gradient(45deg, #1e8449, #27ae60);
    }
</style>

<div class="container text-center my-5">
    <h1 class="display-4">Enjoy Delicious 🥢 Sushi Food</h1>
    <p class="lead">Enjoy a good dinner with the best dishes in the restaurant and improve your day.</p>
    <a href="/PTITCNTT2402/Shopsushi1/History/index" class="btn btn-danger btn-lg">Order Now</a>
</div>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach($productlist as $item) { ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img src="<?=$baseURL?>assets/images/<?= $item['image']?>" alt="Product Image">

                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?= htmlspecialchars($item['name']) ?></h5>
                                <!-- Product price-->
                                <div class="price"><?= number_format($item['price'], 0, ',', '.') ?> VND</div>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">  
                            <form method="post" action="<?=$baseURL .'cart/add'?>">
                                <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                <button type="submit" class="btn btn-primary btn-sm me-2 rounded-3">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php require __DIR__. "/../Layout/HomeFooter.php" ?>
