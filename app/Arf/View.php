<?php

namespace Arf;

class View
{
    const string DEFAULT_STYLESHEET = '/css/style.css';
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

        $filePath = __DIR__ . "/../Views/" . $view . ".php";

        if (file_exists($filePath)) {
//            $content = SealTemplateEngine::parse($filePath, $pageData);
//            echo $content;
            include($filePath);
        } else {
            // handle errors
            echo "error: could not find view at $filePath";
        }
    }

    /**
     * Include stylesheets in view with default stylesheet
     * @param string[] $stylesheets Url to stylesheet
     * @return void
     */
    public static function includeStylesheets(array $stylesheets): void
    {
        if (!in_array(self::DEFAULT_STYLESHEET, $stylesheets)) {
            $stylesheets[] = self::DEFAULT_STYLESHEET;
        }

        foreach ($stylesheets as $stylesheet) {
            echo "<link rel='stylesheet' href='$stylesheet'>";
        }
    }
}