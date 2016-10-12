<?php

namespace Lessons\L_04_07;

/* 4.7 Способы обхода массивов в цикле */
function loopingArrays()
{
    $a = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'];
    $length = count($a);

    /* цикл со счетчиком подходит для обхода массивов с
     * целочисленными индексами, если в их последовательности нет разрывов */
    for ($index = 0; $index < $length; $index++) {
        echo $a[$index], '; ';
    }

    echo PHP_EOL;

    /* цикл для обхода любых массивов и получения значений */
    foreach ($a as $value) {
        echo $value, '; ';
    }

    echo PHP_EOL;

    /* цикл для обхода любых массивов и получения пар ключ-значение */
    foreach ($a as $key => $value) {
        echo $key, ' ', $value, '; ';
    }

    echo PHP_EOL;

    /* колбек для функции array_walk */
    $onArrayElement = function($currentValue, $currentKey, $userValue)
    {
        echo "{$userValue} {$currentKey} : {$currentValue}", PHP_EOL;
    };

    /* третьим параметром передаем любые дополнительные
    данные или можно ничего не передавать */
    array_walk($a, $onArrayElement, 'Element');
}