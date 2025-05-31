<?php
require_once "App/Controllers/ProductController.php";
require_once "App/Controllers/UserController.php";
require_once "App/Controllers/PopularController.php";
require_once "App/Controllers/CartController.php";
require_once "App/Controllers/OrderController.php";
require_once "App/Controllers/AdminController.php";
require_once "App/Controllers/HomeController.php";
require_once "App/Controllers/RecentlyController.php";
require_once "App/Controllers/HistoryController.php";

// Kiểm tra và lấy URL
$url = isset($_GET['url']) ? $_GET['url'] : '';
$urlArr = explode('/', trim($url, '/'));

// Controller mặc định là HomeController, method mặc định là index
$controllerName = !empty($urlArr[0]) ? ucfirst($urlArr[0]) . 'Controller' : 'HomeController';
$methodName = isset($urlArr[1]) ? $urlArr[1] : 'index';

// Kiểm tra class tồn tại
if (class_exists($controllerName)) {
    $controller = new $controllerName(); 

    // Kiểm tra method tồn tại
    if (method_exists($controller, $methodName)) {
        call_user_func([$controller, $methodName]);
    } else {
        echo "❌ Method `$methodName()` không tồn tại trong `$controllerName`.";
    }
} else {
    echo "❌ Controller `$controllerName` không tồn tại.";
}
