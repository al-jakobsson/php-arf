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
}