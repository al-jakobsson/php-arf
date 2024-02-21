<?php

namespace Database;

use PDO;

class Database
{

    public static function getPDO()
    {
        $dsn = "";
        $username = "";
        $password = "";
        $options = [];

        $pdo = new PDO(dsn: $dsn, username: $username, password: $password, options: $options);
    }

}