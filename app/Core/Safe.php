<?php

namespace Core;

class Safe
{
    public static function html(string $dangerousInput): string
    {
        return htmlspecialchars($dangerousInput, ENT_QUOTES, 'UTF-8', true);
    }
}