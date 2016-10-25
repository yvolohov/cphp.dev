<?php

namespace Lessons\L_08_03_TO_09;

/* 8.3 - 8.9 Использование PDO (PHP Data Objects) */
function SQL()
{
    try {
        $pdo = getConnection();
        dropTables($pdo);
        createTables($pdo);
        fillBooks($pdo);
        fillAuthors($pdo);
        selectAuthors($pdo);
    }
    catch(\PDOException $e) {
        die($e->getMessage());
    }

    echo "OK\n";
}

function getConnection()
{
    $host = '127.0.0.1';
    $dbname = 'pdo_db';
    $user = 'root';
    $password = '3091006634';
    $charset = 'utf8';
    $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";
    return new \PDO($dsn, $user, $password);
}

// create table
function createTables($pdo)
{
    /* Таблица книг */
    $stmt = $pdo->query(
        "CREATE TABLE IF NOT EXISTS books(
            id int(11) UNSIGNED AUTO_INCREMENT NOT NULL,
            name varchar(200) NOT NULL,
            PRIMARY KEY(`id`)
        ) ENGINE=InnoDB;"
    );

    /* Таблица авторов */
    $stmt = $pdo->query(
        "CREATE TABLE IF NOT EXISTS authors(
            id int(11) UNSIGNED AUTO_INCREMENT NOT NULL,
            firstname varchar(200) NOT NULL,
            lastname varchar(200) NOT NULL,
            PRIMARY KEY(`id`)
        ) ENGINE=InnoDB;"
    );
}

// delete records
function clearTables($pdo)
{
    /* Очистка таблиц */
    $pdo->query("DELETE FROM books;");
    $pdo->query("DELETE FROM authors WHERE TRUE;");
}

// drop tables
function dropTables($pdo)
{
    /* Удаление таблиц */
    $pdo->query("DROP TABLE books;");
    $pdo->query("DROP TABLE authors;");
}

// insert
function fillBooks($pdo)
{
    // пример использования именованных параметров
    $stmtBooks = $pdo->prepare(
        "INSERT INTO books (name) VALUES (:name)"
    );

    $books = [
        "Робинзон Крузо",
        "Рождение стальной крысы",
        "Стальная крыса идет в армию",
        "Билл - герой Галактики",
        "Неукротимая планета",
        "Приключения Шерлока Холмса",
        "Копи царя Соломона",
        "Тарзан",
        "Мастер и Маргарита"
    ];

    foreach ($books as $book) {
        $stmtBooks->execute(["name" => $book]);
    }
}

// insert
function fillAuthors($pdo)
{
    // пример использования безимянных параметров, заполняемых в порядке следования
    $stmtAuthors = $pdo->prepare(
        "INSERT INTO authors (firstname, lastname) VALUES (?, ?)"
    );

    $authors = [
        ['Даниэль', 'Дефо'],
        ['Гарри', 'Гаррисон'],
        ['Артур', 'Конан Дойл'],
        ['Генри', 'Райдер Хаггард'],
        ['Эдгар', 'Берроуз'],
        ['Михаил', 'Булгаков']
    ];

    foreach ($authors as $author) {
        $stmtAuthors->execute($author);
    }
}

// select, order by, fetch, fetchAll, fetchColumn
function selectAuthors($pdo)
{
    $stmt = $pdo->prepare(
        "SELECT firstname AS fn, lastname AS ln FROM authors
        ORDER BY lastname ASC, firstname ASC"
    );

    $stmt->execute();

    // fetch возвращает данные по одной строке
    while ($row = $stmt->fetch()) {
        echo "Имя: {$row['fn']}; Фамилия: {$row['ln']}; \n";
    }

    $stmt->execute();

    // fetchAll возвращает все выбранные данные в виде массива
    $authors = $stmt->fetchAll();

    foreach ($authors as $row) {
        echo "Имя: {$row['fn']}; Фамилия: {$row['ln']}; \n";
    }

    $stmt2 = $pdo->prepare(
        "SELECT lastname AS ln FROM authors ORDER BY lastname DESC"
    );

    $stmt2->execute();

    // fetchColumn возвращает значения выбранной колонки по одной строке
    while ($ln = $stmt2->fetchColumn()) {
        echo "Фамилия: {$ln}; \n";
    }
}