<?php

namespace Lessons\L_01_20;

/* 1.20 Функции (конструкции языка) isset, unset, list  */
function otherConstructs()
{
    $a = 10;

    /* isset() проверяет хранит ли переменная значение */
    if (isset($a)) {
        echo "Variable a has a value. \n";
    }

    /* unset() удаляет переменную (устанавливает в Null) */
    unset($a);

    if (!isset($a)) {
        echo "Variable a has not a value now. \n";
    }

    /* list() присваивает нескольким переменным значения из массива.
     * Отдельные элементы массива можно пропускать как показано ниже (yellow). */
    list($a, $b, $c, , $e) = ['red', 'green', 'blue', 'yellow', 'grey'];

    echo "a = {$a}; b = {$b}; c = {$c}; e = {$e}\n";
}