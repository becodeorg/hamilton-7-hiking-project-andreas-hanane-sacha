<?php
declare(strict_types=1);

use JetBrains\PhpStorm\NoReturn;

session_start();
require 'vendor/autoload.php';

$routerController = new RouterController();
$routerController->router();

