<?php

namespace Arf;

class Route
{
    public array $routes;
    public function __construct(
        public string $controllerName,
        public string $controllerMethod
    ){}
    public static function create(Route $newRoute)
    {
        $allRoutes = include('Routes.php');
        $allRoutes[] = $newRoute;

        $path = __DIR__ . "/Routes.php";

        $fileContentBeforeRoutes =
            <<<CONTENT_BEFORE
            <?php 
            namespace Arf;

            return [
            CONTENT_BEFORE;

        $fileContentRoutes = "";
        foreach ($allRoutes as $route) {
            $fileContentRoutes .=
                <<<CONTENT_ROUTE
                
                    new Route('{$route->controllerName}', '{$route->controllerMethod}'),
                CONTENT_ROUTE;

        }

        $fileContentAfterRoutes =
            <<<CONTENT_AFTER
            
            ];
            CONTENT_AFTER;

        $fileContent = $fileContentBeforeRoutes . $fileContentRoutes . $fileContentAfterRoutes;

        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }

        echo "Creating route: {$newRoute->controllerName} => {$newRoute->controllerMethod}" . PHP_EOL;

        file_put_contents($path, $fileContent);

        echo "Created route {$newRoute->controllerName} => {$newRoute->controllerMethod} in app/Arf/Routes.php" . PHP_EOL;

    }
}