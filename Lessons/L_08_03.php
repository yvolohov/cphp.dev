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

    echo "OK";

    /*
    $stmt = $pdo->query(
        ""
    );
    */
}