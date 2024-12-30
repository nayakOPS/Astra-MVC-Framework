<?php
// Fore Front Controller that initializes the application and handles the incoming requests
require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;


$app = Application::getInstance(dirname(__DIR__));
$router = $app->getRouter();

// echo " ASTRA ! is running "; // No content should be rendered before the headers are sent


$router->addRoute('GET', '/', [SiteController::class, 'home'])
       ->addRoute('GET', '/contact', [SiteController::class, 'showContactForm'])
       ->addRoute('POST', '/contact', [SiteController::class, 'submitContactForm'])
       ->addRoute('GET', '/login', [AuthController::class, 'login'])
       ->addRoute('POST', '/login', [AuthController::class, 'login'])
       ->addRoute('GET', '/register', [AuthController::class, 'register'])
       ->addRoute('POST', '/register', [AuthController::class, 'register']);

$app->run();

// Output after headers
// echo "\nASTRA ! is running";