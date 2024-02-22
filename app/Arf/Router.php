<?php

namespace Arf;

class Router
{

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
        return parse_url($_SERVER("REQUEST_URI"), PHP_URL_PATH);
    }

    public function findRoute($requestUri, $requestMethod) {
        $routes = include('Routes.php');
        foreach ($routes as $route) {
            $pattern = "@^" . preg_replace('/:\\w+/', '([^/]+)', $route->path) . "$@D";
            $matches = [];

            if ($requestMethod == $route->method && preg_match($pattern, $requestUri, $matches)) {
                array_shift($matches); // Remove the full pattern match
                return ['route' => $route, 'params' => $matches];
            }
        }

        return null;
    }

    public function dispatch() {
        $uri = parse_url($_SERVER("REQUEST_URI"), PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $routeInfo = $this->findRoute($uri, $method);
        if ($routeInfo) {
            $controllerName = $routeInfo['route']->controller;
            $actionName = $routeInfo['route']->action;
            $params = $routeInfo['params'];

            if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
                call_user_func_array([$controllerName, $actionName], $params);
            } else {
                header("HTTP/1.0 404 Not Found");
                echo "404 Not Found";
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "404 Not Found";
        }
    }

    public function getRequestURL()
    {
        $protocol = $this->getProtocol();
        $host = $this->getHost();
        $uri = $this->getURI();

        return $protocol . $host . $uri;
    }
}