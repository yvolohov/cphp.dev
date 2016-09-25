<?php

namespace Lessons\L_06_04;

/* 6.4 Функция может возвращать значения с помощью ключевого слова return */
function returnValues()
{
    /* Return возвращающий значение */
    $value = abc();
    echo "Returned value = {$value};\n";

    /* Return без значения */
    $value = def();
    echo (($value != Null) ? $value : 'Returned value is null' ) . PHP_EOL;

    /* Return возвращающий ссылку */
    $a = 10;
    $b =& ghi($a); // ссылка на $a будет возвращена из функции и присвоена $b
    $b = 15; // меняем значение $b после чего должно изменится и значение $a, стать равным 15
    echo "a = {$a}; b = {$b}; \n"; // a = 15, b = 15
}

function abc()
{
    return rand(1, 10);
}

function def()
{
    /* return без возвращаемого значения просто
     * завершает функцию и возвращает null */
    return;

    /* Эта часть никогда не будет выведена, так как
     * функция завершится на return */
    echo "Код после return";
}

/* Если функция возвращает ссылку, то ее название должно начинаться с символа &
 * а присваивание ссылки принимающей переменной должно делаться с помощью оператора =& */
function &ghi(&$value)
{
    return $value;
}