<?php

namespace Lessons\L_01_15;

/* 1.15 Инициализация переменных. Проверка инициализации
 * переменных. */
function variablesInitializing()
{
    /* Неинициализированная переменная по умолчанию имеет значение NULL */
    $type_a = gettype($a);
    echo "type of a = {$type_a};\n";

    /* Что бы проверить, была ли переменная инициализирована, используем функцию isset() */
    echo isset($a) ? "a is set\n" : "a is not set\n";

    /* Если переменной принудительно присвоить значение Null, она будет считатся неинициализированной */
    $b = Null;
    echo isset($b) ? "b is set\n" : "b is not set\n";

    /* Переменные, которые содержат 0, False, '' считаются инициализированными */
    $c = False;
    echo isset($c) ? "c is set\n" : "c is not set\n";
}