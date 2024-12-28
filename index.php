<?php
// Fore Front Controller that initializes the application and handles the incoming requests
require_once __DIR__ . '/vendor/autoload.php';
use app\core\Application;

$app = new Application();

echo " ASTRA ! is running ";

$app -> router -> get('/', function(){
    return "Hello World";
});

$app -> run();
