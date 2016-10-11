<?php

namespace Lessons\L_04_05;

/* 4.5 Добавление элементов в массив */
function addingElements()
{
    $array = ['a', 'b'];

    /* добавление элементов в конец функцией array_push, возвращает
     * количество элементов после добавления */
    $length = array_push($array, 'c', 'd', 'e');

    echo print_r($array, True), PHP_EOL;
    echo "Новая длина: {$length}", PHP_EOL;

    /* альтернативный способ добавления с помощью оператора [] */
    $array[] = 'f';
    $array[] = 'g';
    $length = count($array);

    echo print_r($array, True), PHP_EOL;
    echo "Новая длина: {$length}", PHP_EOL;

    /* добавление элементов в начало функцией array_unshift, возвращает
     * количество элементов после добавления */
    $length = array_unshift($array, '*a', '*b');

    echo print_r($array, True), PHP_EOL;
    echo "Новая длина: {$length}", PHP_EOL;

    /* ВАЖНО: добавление происходит с конца, т.е. первым элементом будет '*a' */
}