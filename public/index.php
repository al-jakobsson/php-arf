<?php

/**
 * This is the entry point of your Arf app
 *
 * Here, we register the autoloader and route all server requests.
 */

/**
 * @section Register the Arf Autoloader
 */
require_once __DIR__ . '/../app/Arf/Autoload.php';
Arf\Autoload::register();


/**
 * @section Route requests to their respective controller methods
 */

use Controllers\HomeController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path){
    case '/':
        HomeController::home();
        break;
    default:
        echo "Uh oh. 404";
}