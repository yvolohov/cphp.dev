<?php

namespace Lessons\L_06_02;

/* 6.2 Параметры и возвращаемое значение в функциях опциональны */
function declaringFunctions()
{
    $result = abc(10);
    echo (($result != Null) ? $result : 'result is null') . PHP_EOL;

    /* Если параметры не указаны, функция все равно отработает, но будет исходить из того,
     * что параметры равны Null. При этом мы получим предупреждение (warning) в логах:
     * Missing argument 1 for Lessons\\L_06_02\\abc() */
    $result = abc();
    echo (($result != Null) ? $result : 'result is null') . PHP_EOL;

    /* Чтобы избежать warning если параметр не указан нужно указать значение по умолчанию
     * для параметра. Как это сделать показано в функции def() */
    $result = def();
    echo (($result != Null) ? $result : 'result is null') . PHP_EOL;
}

function abc($v)
{
    return $v;
}

function def($v = 15)
{
    return $v;
}