<?php

namespace Lessons\L_04_06;

/* 4.6 Удаление элемента из массива */
function removingElements()
{
    $array = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'];

    /* удаление одного элемента с конца массива */
    $elem = array_pop($array);

    echo print_r($array, True), PHP_EOL;
    echo "Удален элемент: {$elem}", PHP_EOL;

    /* удаление одного элемента с начала массива */
    $elem = array_shift($array);

    echo print_r($array, True), PHP_EOL;
    echo "Удален элемент: {$elem}", PHP_EOL;

    /* попытка удалить элемент пустого массива */
    $array = [];
    $elem = array_pop($array);

    if ($elem == Null) {
        echo 'elem == Null', PHP_EOL;
    }
}