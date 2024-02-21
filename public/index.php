<?php
require_once __DIR__ . '/../app/Core/Autoload.php';

Core\Autoload::register(); // Use the Arf autoloader.

use Controllers\HomeController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path){
    case HomeController::EMPTY_PATH:
    case HomeController::HOME_PATH:
        HomeController::home();
        break;
    default:
        echo "Uh oh. 404";
}