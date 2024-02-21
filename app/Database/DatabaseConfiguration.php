<?php

namespace Database;

class DatabaseConfiguration
{
    public function __construct(
        public string $host = '127.0.0.1',
        public string $db = 'arf',
        public string $user = 'root',
        public string $password = '',
        public string $charset = 'utf8mb4'
    ){}

}