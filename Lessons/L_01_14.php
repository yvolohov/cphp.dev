<?php

namespace Lessons\L_01_14;

/* 1.14 Если нужно, чтобы две переменные указывали на одни и те же данные,
 * используется механизм ссылок. */
function variablesReferencing()
{
    // a и b оба указывают на одну область памяти, в которой находится число 10
    $a = 10;
    $b =& $a; // используем оператор присваивания по ссылке
    echo "a = {$a}; b = {$b};\n";

    // изменим значение через переменную a и убедимся, что b тоже изменилась
    $a = 15;
    echo "a = {$a}; b = {$b};\n";

    // изменим значение через переменную b и убедимся, что a тоже изменилась
    $b = 20;
    echo "a = {$a}; b = {$b};\n";
}