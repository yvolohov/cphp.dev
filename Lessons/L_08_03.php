<?php

namespace Lessons\L_08_03;

/* 8.3 SQL */
function SQL()
{
    $host = '127.0.0.1';
    $dbname = 'pdo_db';
    $user = 'root';
    $password = '3091006634';
    $charset = 'utf8';
    $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";

    try {
        $pdo = new \PDO($dsn, $user, $password);
    }
    catch (\PDOException $e) {
        die($e->getMessage());
    }

    $stmt = $pdo->query(
        "CREATE TABLE IF NOT EXISTS books(
            id int(11) UNSIGNED AUTO_INCREMENT NOT NULL,
            name varchar(200) NOT NULL,
            PRIMARY KEY(`id`)
        ) ENGINE=InnoDB;"
    );

}