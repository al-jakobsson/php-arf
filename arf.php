<?php

namespace Arf;

/**
 * This script runs the Arf command line tool
 *
 * Here, we register the Arf autoloader and run the tool
 * with the arguments from the command line
 */


/**
 * @section Register the Arf autoloader
 */

require_once __DIR__ . '/app/Arf/Autoload.php';
Autoload::register();


/**
 * @section Start the Arf command line tool
 */

$arf = new ArfCommandLineTool($argc, $argv);
$arf->start();




