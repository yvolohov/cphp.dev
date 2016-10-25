<?php

namespace Lessons\L_04_08;

/* 4.8 Сортировка массивов */
function sortingArrays()
{
    // SORT_REGULAR обычное сравнение элементов, без изменния типов
    $array1 = ['banana', 'apple', 'nut', 'orange', 'apricot'];
    $array2 = [5, 3, 0, 1, 2, 8, 10];

    sort($array1, SORT_REGULAR);
    sort($array2, SORT_REGULAR);
    echo print_r($array1, True), PHP_EOL;
    echo print_r($array2, True), PHP_EOL;

    /* сортировка удаляет ключи и заменяет их стандартными индексами от нуля */
    $array3 = ['hamster' => 'hamster', 'cat' => 'cat', 'dog' => 'dog'];
    sort($array3, SORT_REGULAR);
    echo print_r($array3, True), PHP_EOL;

    /* SORT_NUMERIC для чисел и SORT_STRING для строк */
    $array4 = ['123bc', 22, 15, 17, 1, 240];
    $array5 = ['123bc', 22, 15, 17, 1, 240];

    sort($array4, SORT_NUMERIC); // здесь строка 123bc приводится к числу 123
    sort($array5, SORT_STRING); // здесь все числа приводятся к строке

    echo print_r($array4, True), PHP_EOL;
    echo print_r($array5, True), PHP_EOL;

    // TODO: SORT_LOCALE_STRING
}