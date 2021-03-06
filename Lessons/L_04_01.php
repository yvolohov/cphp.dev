<?php

namespace Lessons\L_04_01;

/* 4.1 Массив это особый тип переменных, способный хранить не одно а
 * множество значений. */
function arrayDefinition()
{
    /* У массивов есть ключи и значения.
     * Значения это данные, которые хранятся в массиве а
     * ключи нужны для навигации по этих данных.
     * В данном массиве ключи это числа 0,1,2
     * а значения это строки 'RED', 'GREEN', 'BLUE' */
    $colors = [0 => 'RED', 1 => 'GREEN', 2 => 'BLUE'];

    echo "Colors array: ", print_r($colors, True), PHP_EOL;

    /* Получаем значения из массива по ключах */
    echo $colors[2], '; ', $colors[0], '; ', $colors[1], '; ', PHP_EOL;
}