<?php
declare(strict_types=1);

use JetBrains\PhpStorm\NoReturn;

session_start();
require 'vendor/autoload.php';

$url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

$routerController = new RouterController();
$routerController->router();

