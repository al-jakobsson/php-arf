<?php

namespace Arf;

class Model
{
    public static function create($modelName): void
    {
        $path = __DIR__ . "/../Models/$modelName.php";

        $fileContent =
            <<<MODEL_CLASS_DEFINITION
            <?php
            
            namespace Models;
            
            class $modelName 
            {
                // Initialize member variables here
            
                public function __construct(
                // You can also initialize member variables in the signature of the constructor
                ){}
                
                public static function all()
                {
                // Implement logic here to get all instances of $modelName from the database
                }
                
                public static function get{$modelName}ById(int \$id)
                {
                // Implement logic here to get one instance of $modelName from the database by an id
                }
                
                // Implement other methods here
            
            }
            MODEL_CLASS_DEFINITION;

        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }

        echo "Creating model: $modelName" . PHP_EOL;

        file_put_contents($path, $fileContent);

        echo "Created model $modelName in app/Models/$modelName.php" . PHP_EOL;

    }
}