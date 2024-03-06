<?php

namespace Arf;


class HTTP
{
    public static function redirect($url, $statusCode = 302): void
    {
        header("Location: $url", true, $statusCode);
        exit;
    }

    public static function setHeader($header, $replace = true)
    {
        header($header, $replace);
    }

}