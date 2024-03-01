<?php

namespace Models;

class Fizzbuzz
{

    public function __construct(public int $count){}

    public function getFizzbuzzValue(int $n): int|string
    {
        return match (true) {
          $n % 15 === 0 => 'fizzbuzz',
          $n % 5 === 0 => 'buzz',
          $n % 3 === 0 => 'fizz',
          default => $n,
        };
    }

    public function getFizzbuzzClass(int $n): string
    {
        return match (true) {
            $n % 15 === 0 => 'blue',
            $n % 5 === 0 => 'red',
            $n % 3 === 0 => 'green',
            default => '',
        };
    }
}