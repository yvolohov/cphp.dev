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
        fillReaders($pdo);
        updateReaders($pdo);
        //selectAuthors($pdo);
        //groupAuthors($pdo);
        //innerJoin($pdo);
        //leftJoin($pdo);
        //rightJoin($pdo);
        //fullJoin($pdo);
        //crossJoin($pdo);
        excludingJoins($pdo);
    }
    catch(\PDOException $e) {
        die($e->getMessage());
    }

    echo PHP_EOL, "OK", PHP_EOL;
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
    /* Функция query предназначена для выполнения запроса не имеющего параметров.
     * Она выполняет запрос одной операцией. Альтернативой ей является
     * использование пары функций prepare() и execute() */

    /* Таблица книг */
    $stmt = $pdo->query(
        "CREATE TABLE IF NOT EXISTS books(
            id int(11) UNSIGNED AUTO_INCREMENT NOT NULL,
            name varchar(200) NOT NULL,
            author int(11) UNSIGNED NOT NULL,
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

    /* Таблица читателей */
    $stmt = $pdo->query(
        "CREATE TABLE IF NOT EXISTS readers(
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
    $pdo->query("DELETE FROM readers;");
}

// drop tables
function dropTables($pdo)
{
    /* Удаление таблиц */
    $pdo->query("DROP TABLE books;");
    $pdo->query("DROP TABLE authors;");
    $pdo->query("DROP TABLE readers;");
}

// insert
function fillBooks($pdo)
{
    /* Функция prepare() компилирует запрос, функция execute() его выполняет с
     * заданными параметрами. Скомпилированный запрос можно выполнять многократно.  */

    // пример использования именованных параметров
    $stmtBooks = $pdo->prepare(
        "INSERT INTO books (name, author) VALUES (:name, :author)"
    );

    $books = [
        ["Робинзон Крузо", 1],
        ["Рождение стальной крысы", 2],
        ["Стальная крыса идет в армию", 2],
        ["Билл - герой Галактики", 2],
        ["Неукротимая планета", 2],
        ["Приключения Шерлока Холмса", 3],
        ["Копи царя Соломона", 4],
        ["Тарзан", 5],
        ["Мастер и Маргарита", 6],
        ["Хоббит", 10]
    ];

    foreach ($books as $book) {
        $stmtBooks->execute([
            "name" => $book[0],
            "author" => $book[1]
        ]);
    }
}

// insert
function fillAuthors($pdo)
{
    // пример использования безимянных параметров, заполняемых в порядке следования
    $stmtAuthors = $pdo->prepare(
        "INSERT INTO authors (id, firstname, lastname) VALUES (?, ?, ?)"
    );

    $authors = [
        [1, 'Даниэль', 'Дефо'],
        [2, 'Гарри', 'Гаррисон'],
        [3, 'Артур', 'Конан Дойл'],
        [4, 'Генри', 'Райдер Хаггард'],
        [5, 'Эдгар', 'Берроуз'],
        [6, 'Михаил', 'Булгаков'],
        [7, 'Артур', 'Шопенгауэр'],
        [8, 'Генри', 'Миллер']
    ];

    foreach ($authors as $author) {
        $stmtAuthors->execute($author);
    }
}

// insert
function fillReaders($pdo)
{
    $stmtReaders = $pdo->prepare(
        "INSERT INTO readers (id, firstname, lastname) VALUES (?, ?, ?)"
    );

    $stmtReaders->execute([1, 'Иван', 'Иванов']);
    $stmtReaders->execute([2, 'Петр', 'Петров']);
    $stmtReaders->execute([3, 'Сидор', 'Сидоров']);
}

// update, transaction example
function updateReaders($pdo)
{
    /* Транзакция это объединение нескольких SQL-операций в одно целое.
     * При этом они либо все будут выполнены, либо ни одна из них не будет выполнена. */

    $pdo->beginTransaction(); // начало транзакции

    try {
        $stmtReaders = $pdo->prepare(
            "UPDATE readers SET firstname = ?, lastname = ? WHERE id = ?"
        );

        // все три обновления будут выполнены одним пакетом
        $stmtReaders->execute(['ИВАН', 'ИВАНОВ', 1]);
        $stmtReaders->execute(['ПЕТР', 'ПЕТРОВ', 2]);
        $stmtReaders->execute(['СИДОР', 'СИДОРОВ', 3]);

        $pdo->commit(); // записываем транзакцию
    }
    catch (\PDOException $e) {
        $pdo->rollBack(); // в случае ошибки откатываем транзакцию
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

    echo PHP_EOL;
}

// group by, aggregation
function groupAuthors($pdo)
{
    $stmtAuthors = $pdo->prepare(
        "SELECT firstname fn, COUNT(*) cnt FROM authors GROUP BY firstname"
    );

    $stmtAuthors->execute();
    $names = $stmtAuthors->fetchAll();

    foreach ($names as $name) {
        echo "Имя: {$name['fn']}; Количество: {$name['cnt']}\n";
    }

    $stmtAuthors2 = $pdo->prepare(
        "SELECT COUNT(firstname) cnt, COUNT(DISTINCT firstname) dcnt FROM authors"
    );

    $stmtAuthors2->execute();
    $stats = $stmtAuthors2->fetch();

    echo "Количество имен авторов: {$stats['cnt']}; Количество различных имен: {$stats['dcnt']}; \n";
    echo PHP_EOL;
}

// inner join (join)
function innerJoin($pdo)
{
    /* INNER JOIN или просто JOIN (синонимы) означают внутренне соединение.
     * В результат попадут только те книги, у которых есть автор
     * и только те авторы, у которых есть книги */
    $stmtJoin = $pdo->query(
        "SELECT
        books.name AS book,
        authors.firstname AS firstname,
        authors.lastname AS lastname
        FROM books
        INNER JOIN authors
        ON (books.author = authors.id)
        ORDER BY lastname, firstname, book"
    );

    $joinResult = $stmtJoin->fetchAll();

    foreach ($joinResult as $row) {
        echo "{$row['lastname']}, {$row['firstname']}, {$row['book']}\n";
    }

    echo PHP_EOL;
}

// left join (left outer join)
function leftJoin($pdo)
{
    /* LEFT JOIN или LEFT OUTER JOIN (синонимы) означают левое соединение.
     * В результат попадут все книги, но только те авторы у которых есть книги. */
    $stmtJoin = $pdo->query(
        "SELECT
        books.name AS book,
        IFNULL(authors.firstname, 'unknown') AS firstname,
        IFNULL(authors.lastname, 'unknown') AS lastname
        FROM books
        LEFT JOIN authors
        ON (books.author = authors.id)
        ORDER BY lastname, firstname, book"
    );

    $joinResult = $stmtJoin->fetchAll();

    foreach ($joinResult as $row) {
        echo "{$row['lastname']}, {$row['firstname']}, {$row['book']}\n";
    }

    echo PHP_EOL;
}

// right join (right outer join)
function rightJoin($pdo)
{
    /* RIGHT JOIN или RIGHT OUTER JOIN (синонимы) означают левое соединение.
     * В результат попадут все авторы, но только те книги у которых есть автор. */
    $stmtJoin = $pdo->query(
        "SELECT
        IFNULL(books.name, 'unknown') AS book,
        authors.firstname AS firstname,
        authors.lastname AS lastname
        FROM books
        RIGHT OUTER JOIN authors
        ON (books.author = authors.id)
        ORDER BY lastname, firstname, book"
    );

    $joinResult = $stmtJoin->fetchAll();

    foreach ($joinResult as $row) {
        echo "{$row['lastname']}, {$row['firstname']}, {$row['book']}\n";
    }

    echo PHP_EOL;
}

// full outer join
function fullJoin($pdo)
{
    /* My SQL не поддерживает FULL OUTER JOIN. Но его можно симулировать юнионом LEFT и RIGHT JOINS. */
    $stmtJoin = $pdo->query(
        "SELECT
        books.name AS book,
        IFNULL(authors.firstname, 'unknown') AS firstname,
        IFNULL(authors.lastname, 'unknown') AS lastname
        FROM books
        LEFT JOIN authors
        ON (books.author = authors.id)
        UNION
        SELECT
        IFNULL(books.name, 'unknown') AS book,
        authors.firstname AS firstname,
        authors.lastname AS lastname
        FROM books
        RIGHT JOIN authors
        ON (books.author = authors.id)"
    );

    $joinResult = $stmtJoin->fetchAll();

    foreach ($joinResult as $row) {
        echo "{$row['lastname']}, {$row['firstname']}, {$row['book']}\n";
    }

    echo PHP_EOL;
}

// cross join
function crossJoin($pdo)
{
    /* CROSS JOIN это комбинация всех строк двух таблиц. У CROSS JOIN нет условия ON в противном случае
     * это уже не CROSS JOIN а INNER JOIN */
    $stmtJoin = $pdo->query(
        "SELECT
        books.name AS book,
        authors.firstname AS firstname,
        authors.lastname AS lastname
        FROM books
        CROSS JOIN authors
        ORDER BY lastname, firstname, book"
    );

    $joinResult = $stmtJoin->fetchAll();

    foreach ($joinResult as $row) {
        echo "{$row['lastname']}, {$row['firstname']}, {$row['book']}\n";
    }

    echo PHP_EOL;
}

// excluding joins
function excludingJoins($pdo)
{
    /* excluding joins это разновидности JEFT JOIN, RIGHT JOIN или FULL JOIN
     * в которых выбираются только строки, которые не имеют соответствия в другой таблице.
     * Это достигается дополнительным условием WHERE */
    $stmtJoin = $pdo->query(
        "SELECT
        books.name AS book,
        IFNULL(authors.firstname, 'unknown') AS firstname,
        IFNULL(authors.lastname, 'unknown') AS lastname
        FROM books
        LEFT JOIN authors
        ON (books.author = authors.id)
        WHERE authors.id IS NULL
        ORDER BY lastname, firstname, book"
    );
    // WHERE authors.id IS NULL - это и есть дополнительное условие

    $joinResult = $stmtJoin->fetchAll();

    foreach ($joinResult as $row) {
        echo "{$row['lastname']}, {$row['firstname']}, {$row['book']}\n";
    }

    echo PHP_EOL;
}