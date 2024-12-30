<?php
// Fore Front Controller that initializes the application and handles the incoming requests
require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;


$app = new Application(dirname(__DIR__));

// echo " ASTRA ! is running "; // No content should be rendered before the headers are sent

// $app -> router -> get('/', function(){
//     return "Hello World";
// });

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/', [SiteController::class, 'home']);
$app -> router -> post('/contact', [SiteController::class,'handleContact']);

$app -> router -> get('/login', [AuthController::class,'login']);
$app -> router -> post('/login', [AuthController::class,'login']);
$app -> router -> get('/register', [AuthController::class,'register']);
$app -> router -> post('/register', [AuthController::class,'register']);

$app -> run();

// Output after headers
// echo "\nASTRA ! is running";