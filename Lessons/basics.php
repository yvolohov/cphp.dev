<?php

namespace Lessons\Basics;

/* 1.1 Элементарная единица PHP кода называется оператором. Оператор завершается символом 'точка с запятой', который
 * означает конец оператора. На одной строке можно располагать несколько операторов. Один оператор можно располагать на
 * нескольких строках. Возможен пустой оператор, который не содержит никаких символов. */
function punctuation()
{
    $first = 1; $second = 2;
    $third = 3;
    $fourth
        = 4;
    ; ;;
}

/* 1.2 В PHP режим кода изначально отключен. Это значит что интерпретатор воспринимает файлы с расширением .php как
 * текст. Чтобы включить режим кода существует несколько способов:
 * - cтандартный тег: <?php ?>
 * - тег script: <script language="php"> </script>
 * - сокращенный тег: <?= ?>
 * - еще один сокращенный тег: <% %>
 * Не рекомендуется использовать два последних варианта.
 */
function tags()
{
    /* Выходим из режима кода в режим текста  */ ?>

    <b> Здесь нет PHP, только HTML </b>

    <script language="php">
        /* Снова входим в режим кода */
        echo "Здесь PHP снова работает \n";
        /* Выходим из режима кода в режим текста  */
    </script>

   <?php /* снова входим в режим кода */
}

/* 1.3 Существует три вида комментариев в php.
 * Все они представлены ниже. */
function comments()
{
    // Это однострочный комментарий, продолжающийся до конца строки

    # Это еще один однострочный комментарий, тоже продожающийся до конца строки

    /* Это многострочный комментарий
    который может распространяться на
    несколько строк */

    /* Или присутствовать */ /* сразу в нескольких местах */ /* на одной строке */

    // /* /* Нельзя вкладывать многострочные комментарии друг в друга, это приведет к ошибке */ */
}

/* 1.4 Арифметические операторы php - сложение, вычитание, умножение,
 * деление, остаток от деления. */
function arithmeticOperators()
{
    $add = 2 + 2; // 4
    $sub = 4 - 2; // 2
    $mul = 3 * 3; // 9
    $div = 10 / 3.33; // 3.003003003003

    echo "add = {$add}; sub = {$sub}; mul = {$mul}; div = {$div};\n";

    /* Оператор остатка от деления работает только с целыми числами.
     * Если передать ему число с плавающей точкой,
     * то от этого числа просто будет отброшена дробная часть. */
    $rest1 = 10 % 3; // 1
    $rest2 = 10 % 3.33; // 1 потому что 3.33 будет приведено к 3
    $rest3 = 10.6 % 3; // 1 потому что 10.6 будет приведено к 10

    /* Оператор остатка от деления возвращает отрицательный результат в том случае,
     * если первое число отрицательное. */
    $rest4 = -20 % 3; // -2 потому что -20 отрицательное значение

    echo "rest1 = {$rest1}; rest2 = {$rest2}; rest3 = {$rest3}; rest4 = {$rest4}\n";
}

/* 1.8 Строковые операторы - конкатенация и
 * сокращенная форма конкатенации */
function stringOperators()
{
    // конкатенация
    $phrase1 = 'hello ' . 'world ' . '!!!';

    // сокращенная форма конкатенации
    $phrase2 = 'HELLO ';
    $phrase2 .= 'WORLD ';
    $phrase2 .= '!!!';

    echo "{$phrase1}\n{$phrase2}\n";
}