<?php

namespace Arf;

class Route
{
    public array $routes;
    public function __construct(
        public string $method,
        public string $path,
        public string $controllerName,
        public string $controllerMethod
    ){}
    public static function create(Route $newRoute)
    {
        $allRoutes = include(__DIR__ . '/../Routes/Routes.php');

        $newRoutes = ($newRoute->controllerMethod === ArfCommandLineTool::ARF)
            ? [
                new Route("GET", $newRoute->path, $newRoute->controllerName, 'index'),
                new Route("GET", "{$newRoute->path}/:id", $newRoute->controllerName, 'show'),
                new Route("GET", "{$newRoute->path}/new", $newRoute->controllerName, 'new'),
                new Route("POST", "{$newRoute->path}/store/:id", $newRoute->controllerName, 'store'),
                new Route("GET", "{$newRoute->path}/edit/:id", $newRoute->controllerName, 'edit'),
                new Route("PUT", "{$newRoute->path}/update/:id", $newRoute->controllerName, 'update'),
                new Route("GET", "{$newRoute->path}/delete/:id", $newRoute->controllerName, 'delete'),
                new Route("DELETE", "{$newRoute->path}/destroy/:id", $newRoute->controllerName, 'destroy'),
            ]
            : [ $newRoute ];

        $allRoutes = array_merge($allRoutes, $newRoutes);

        $fileContentRoutes = "";
        foreach ($allRoutes as $route) {
            $fileContentRoutes .=
                <<<CONTENT_ROUTE
                
                    new Route("{$route->method}", "{$route->path}", "{$route->controllerName}", "{$route->controllerMethod}"),
                CONTENT_ROUTE;

        }

        $fileContentBeforeRoutes =
            <<<CONTENT_BEFORE
            <?php 
            namespace Arf;

            return [
            CONTENT_BEFORE;

        $fileContentAfterRoutes =
            <<<CONTENT_AFTER
            
            ];
            CONTENT_AFTER;

        $fileContent = $fileContentBeforeRoutes . $fileContentRoutes . $fileContentAfterRoutes;

        $path = __DIR__ . "/../Routes/Routes.php";

        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }

        echo "Creating route: {$newRoute->controllerName} => {$newRoute->controllerMethod}" . PHP_EOL;

        file_put_contents($path, $fileContent);

        echo "Created route {$newRoute->controllerName} => {$newRoute->controllerMethod} in app/Routes/Routes.php" . PHP_EOL;

    }
}