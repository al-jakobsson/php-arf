<?php

namespace Arf;

use Arf\Route;

class Router
{
    public array $routes;

    public function __construct(

    )
    {
        $this->routes = include(__DIR__ . '/../Routes/Routes.php');
    }

    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];

    }

    public function getProtocol(): string
    {
        return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) 
            ? "https://" 
            : "http://";
    }

    public function getHost(): string
    {
        return $_SERVER["HTTP_HOST"];
    }

    public function getURI(): string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function getRequestURL()
    {
        $protocol = $this->getProtocol();
        $host = $this->getHost();
        $uri = $this->getURI();

        return $protocol . $host . $uri;
    }

    public function dispatch()
    {
        $requestMethod = $this->getMethod();
        $requestPath = $this->getURI();

        preg_match('/\/(\d+)(\/|$)/', $requestPath, $matches);
        $id = $matches[1] ?? null;

        $modifiedPath = preg_replace('/\/\d+(\/|$)/', '/:id$1', $requestPath);

        $routeToExecute = null;
        $routeParams = [$id]; // To store parameters from the route

        foreach ($this->routes as $route) {
            if ($route->method === $requestMethod && $route->path === $modifiedPath) {
                $routeToExecute = $route;
                break;
            }
        }

        if ($routeToExecute) {

            $controllerFilePath = __DIR__ . '/../Controllers/' . $routeToExecute->controllerName . '.php';
            if (file_exists($controllerFilePath)) {
                require_once $controllerFilePath;

                $fullyQualifiedClassName = 'Controllers\\' . $routeToExecute->controllerName;
                if (class_exists($fullyQualifiedClassName)) {
                    $controller = new $fullyQualifiedClassName();
                    if (method_exists($controller, $routeToExecute->controllerMethod)) {
                        call_user_func_array([$controller, $routeToExecute->controllerMethod], $routeParams);
                    } else {
                        echo "Method not found.";
                    }
                } else {
                    echo "Controller class not found.";
                }
            } else {
                echo "Controller file not found.";
            }
        } else {
            echo "Couldn't find a matching route.";
        }
    }
}