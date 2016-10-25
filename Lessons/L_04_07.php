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

    echo PHP_EOL, PHP_EOL;
    loopingArraysContinued();
}

/* другие фунции для работы с массивами */
function loopingArraysContinued()
{
    /* проверка наличия ключа в массиве */
    $a = ['one' => 1, 'two' => 2];
    $resultOne = array_key_exists('one', $a);
    $resultThree = array_key_exists('three', $a);

    echo ($resultOne) ? "ключ one существует\n" : "ключ one не существует\n";
    echo ($resultThree) ? "ключ three существует\n" : "ключ three не существует\n";

    /* проверка наличия значения в массиве */
    $b = ['1', '2', '3'];
    $result = in_array(2, $b);
    $resultStrict1 = in_array(2, $b, True); /* Если третий параметр True, то сравнивает с учетом типа */
    $resultStrict2 = in_array('2', $b, True);

    echo ($result) ? "значение 2 есть в массиве\n" : "значения 2 нет в массиве\n";
    echo ($resultStrict1) ? "значение 2 есть в массиве\n" : "значения 2 нет в массиве\n";
    echo ($resultStrict2) ? "значение 2 есть в массиве\n" : "значения 2 нет в массиве\n";

    /* возврат всех ключей массива */
    $c = ['one' => 1, 'two' => 2, 'three' => 3, 'another_two' => 2];
    $keys = print_r(array_keys($c), True);
    echo "{$keys}\n";

    /* поиск ключей по значению 2 и возврат */
    $keys = print_r(array_keys($c, 2), True);
    echo "{$keys}\n";

    /* возврат всех значений массива (дубли не сворачиваются) */
    $values = print_r(array_values($c), True);
    echo "{$values}\n";
}