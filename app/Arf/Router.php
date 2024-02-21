<?php

namespace Arf;

class Router
{

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
        return $_SERVER("REQUEST_URI");
    }

    public function getRequestURL()
    {
        $protocol = $this->getProtocol();
        $host = $this->getHost();
        $uri = $this->getURI();

        return $protocol . $host . $uri;
    }
}