<?php

namespace Arf;

class Controller
{
    public static function create($controllerName): void
    {
        $controllerName = $controllerName . "Controller";
        $path = __DIR__ . "/../Controllers/$controllerName.php";

        $fileContent =
            <<<CONTROLLER_CLASS_DEFINITION
            <?php
            
            namespace Controllers;
            
            class $controllerName 
            {
                
                public static function index()
                {
                // Logic for handling index route here
                }
                
                public static function show()
                {
                // Logic for handling show route here
                }
                
                public static function create()
                {
                // Logic for handling create route here
                }
                
                public static function store()
                {
                // Logic for handling store route here
                }
                
                public static function edit()
                {
                // Logic for handling edit route here
                }
                
                public static function update()
                {
                // Logic for handling update route here
                }
                
                public static function delete()
                {
                // Logic for handling delete route here
                }
                
                public static function destroy()
                {
                // Logic for handling destroy route here
                }
                
            
            }
            CONTROLLER_CLASS_DEFINITION;

        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }

        echo "Creating controller: $controllerName" . PHP_EOL;

        file_put_contents($path, $fileContent);

        echo "Created controller $controllerName in app/Controllers/$controllerName.php" . PHP_EOL;

    }
}