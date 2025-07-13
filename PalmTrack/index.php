<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // ✅ WAJIB: untuk akses $_SESSION
define('BASE_PATH', __DIR__);

$url = isset($_GET['url']) ? $_GET['url'] : null;

if ($url) {
    $url = rtrim($url, '/');
    $url = explode('/', $url);

    $controllerName = ucfirst($url[0]);
    $controllerFile = BASE_PATH . '/Controllers/' . $controllerName . '.php';

    if (file_exists($controllerFile)) {
        require_once $controllerFile;

        $controller = new $controllerName;
        $methodName = isset($url[1]) ? $url[1] : 'index';

        if (method_exists($controller, $methodName)) {
            $params = array_slice($url, 2);
            call_user_func_array([$controller, $methodName], $params);
        } else {
            echo "Error: Method '{$methodName}' tidak ditemukan di Controller '{$controllerName}'.";
        }
    } else {
        echo "Error: Controller '{$controllerName}' tidak ditemukan.";
    }
} else {
    if (isset($_SESSION['user'])) {
        $role = $_SESSION['user']['role'];
        header("Location: /PalmTrack/$role/index");
        exit;
    } else {
        header("Location: /PalmTrack/auth/login");
        exit;
    }
}

