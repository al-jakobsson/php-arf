<?php

namespace Database;

use PDO;
use PDOException;

class Database
{

    public static function getPDO( DatabaseConfiguration $db_config = new DatabaseConfiguration()): PDO
    {
        $dsn = "mysql:host={$db_config->host};dbname={$db_config->db};charset={$db_config->charset}";
        $options = [
            PDO::ATTR_ERRMODE             =>  PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE  =>  PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES    =>  false,
        ];

        try {
            $pdo = new PDO($dsn, $db_config->user, $db_config->password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }

        return $pdo;
    }

}