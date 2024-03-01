<?php

namespace Controllers;

use Arf\View;
use Models\Fizzbuzz;

class FizzbuzzController
{
    public static function fizzbuzz(): void
    {
        $fizzbuzz = new Fizzbuzz(count: 100);
        View::render('FizzbuzzPage', ['fizzbuzz' => $fizzbuzz]);
    }

    public static function getFizzbuzzValue(int $n): int|string
    {
        return match (true) {
            $n % 15 === 0 => 'fizzbuzz',
            $n % 5 === 0 => 'buzz',
            $n % 3 === 0 => 'fizz',
            default => $n,
        };
    }

}