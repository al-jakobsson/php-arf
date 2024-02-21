<?php

namespace Models;

use Database\Database;

class User {

    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string $password
    ){}

    public static function createUsersTable()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query(
            <<<CREATE_USERS_TABLE
            CREATE TABLE IF NOT EXISTS users (
                user_id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL
            ) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin
            CREATE_USERS_TABLE

        );

        $pdo->exec($stmt);
    }

    public static function all(): array
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query(
            <<<ALL_USERS_QUERY
            SELECT users.*, users.*
            FROM users;
            ALL_USERS_QUERY

        );
    }
}