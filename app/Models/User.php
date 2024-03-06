<?php

namespace Models;

use Database\Database;
use PDO;
use PDOException;

class User
{
    // Initialize member variables here

    public function __construct(
    // You can also initialize member variables in the signature of the constructor
        public int $id,
        public string $name,
        public string $email,
        public string $created_at
    ){}

    public static function createUsersTable(PDO $pdo): void
    {
        $query =
        "CREATE TABLE IF NOT EXISTS Users (
            user_id INT AUTO_INCREMENT PRIMARY KEY,
            user_name VARCHAR(255) NOT NULL,
            user_email VARCHAR(255) NOT NULL,
            user_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        try {
            $pdo->exec($query);
            echo "Table users created successfully.";
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }


    public static function all(): array
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM users";
        try {
            $stmt = $pdo->query($sql);

            // Fetch all rows
            $rows = $stmt->fetchAll();

            $allUsers = [];
            foreach ($rows as $row) {
                $allUsers[] = new User(
                  id: $row['user_id'],
                  name: $row['user_name'],
                  email: $row['user_email'],
                  created_at: $row['user_created_at']
                );
            }
            return $allUsers;

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getUserById(int $userId): ?User
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM Users WHERE user_id = :id";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row
                ? new User(
                    id: $row['user_id'],
                    name: $row['user_name'],
                    email: $row['user_email'],
                    created_at: $row['user_created_at']
                )
                : null;

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function createUser(string $name, string $email): StatusMessage
    {
        $pdo = Database::getPDO();

        $sql = "INSERT INTO Users (user_name, user_email, user_created_at) VALUES (:name, :email, NOW())";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $success = $stmt->execute();

            return $success
                ? new StatusMessage(true, "User created successfully")
                : new StatusMessage(false, "Failed to create user");

        } catch (PDOException $e) {
            return new StatusMessage(false, "Database error: {$e->getMessage()}");
        }
    }


    // Implement other methods here

}