<?php

namespace Core;

class View
{
    public static function render(string $view, array $pageData): void
    {
        extract($pageData);

        $file = __DIR__ . "/../Views/$view.php";
        if (file_exists($file)) {
            require $file;
        } else {
            echo "Whoops! No file found in View::render()";
        }

    }
    public static function renderPage()
    {
        
    }
}