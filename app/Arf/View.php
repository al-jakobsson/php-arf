<?php

namespace Arf;

class View
{
    public static function create($viewName): void
    {
        $viewShortName = $viewName;
        $viewName = $viewName . "Page";
        $path = __DIR__ . "/../Views/$viewName.php";

        $fileContent =
            <<<VIEW_DEFINITION
            <?php

            namespace Views;
            
            use Arf\Safe;
            
            /** @var string \$title The title of the page */
            ?>
            
            <!doctype html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport"
                      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title><?= Safe::html(\$title ?? '$viewShortName')?>></title>
                <link rel="stylesheet" href="/css/style.css">
            </head>
            <body>
                <h1><?= Safe::html(\$title ?? '$viewShortName page')?></h1>
            </body>
            </html>
            VIEW_DEFINITION;

        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }

        echo "Creating view: $viewName" . PHP_EOL;

        file_put_contents($path, $fileContent);

        echo "Created view $viewName in app/Views/$viewName.php" . PHP_EOL;

    }

    /**
     * Render any simple view with page data
     * @param string $view
     * @param array $pageData
     * @return void
     */
    public static function render(string $view, array $pageData = []): void
    {
        extract($pageData);

        $file = __DIR__ . "/../Views/" . $view . ".php";

        if (file_exists($file)) {
            require $file;
        } else {
            // handle errors
            echo "error: could not find view at $file";
        }
    }

    /**
     * Render full page with header and optional additional components
     *
     * @param PageConfiguration $config
     * @return void
     */
    public static function renderPage(PageConfiguration $config): void
    {
        self::render($config->header, ['title' => $config->title]);
        self::renderComponents($config->beforeContent);
        self::render($config->view, $config->pageData);
        self::renderComponents($config->afterContent);
    }

    private static function renderComponents(array $components): void
    {
        foreach ($components as $component => $data) {
            self::render($component, $data);
        }
    }

}