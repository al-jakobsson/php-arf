<?php

namespace Arf;

class Clean
{
    public static function name(string $name): array|string|null
    {
        return preg_replace("/[^a-zA-Z' -]/", '', $name);
    }
}