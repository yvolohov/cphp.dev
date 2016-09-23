<?php

namespace Lessons\L_01_11;

/* 1.11 Оператор выполнения. Предназначен для передачи команд
 * в операционную систему. */
function executionOperators()
{
    /* передаем команду в командную строку, получаем и выводим результат */
    $result = `ls -l`;
    echo "$result\n";

    /* то же самое, но с помощью функции shell_exec */
    $result = shell_exec('ls -l');
    echo "$result\n";
}