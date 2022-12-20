<?php
declare(strict_types=1);

session_start();

require 'vendor/autoload.php';

$url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$method = $_SERVER['REQUEST_METHOD'];

$maSession = [];

if ($url === '/' || $url === '') {
    $homeController = new HomeController();
    $homeController->index();
}

if ($url === 'registration') {
    $authController = new AuthController();

    if ($method === 'GET') {
        $authController->showRegistrationForm();
    }

    if ($method === 'POST') {
        $authController->register($_POST);
    }
}


if ($url === 'profil') {
    $userController = new UserController();
    if($method === 'GET'){
        $userController->showProfile();
    }else {
        switch ($_POST['update']) {
            case "1":
                $userController->showProfile();
                break;
            case "2":
                try {
                    $userController->updateProfile($_POST);
                } catch (Exception $e) {
                }
                break;
            case "3":
                try {
                    $userController->deleteProfile();
                } catch (Exception $e) {
                }
                break;
            default:
                $userController->showProfile();
        }
    }
}
if ($url === 'login') {
    $authController = new AuthController();

    if ($method === 'GET') {
        $authController->showLoginForm();
    }

    if ($method === 'POST') {
        $authController->login($_POST);
    }
}

if ($url === 'logout') {
    $authController = new AuthController();
    $authController->logout();
}