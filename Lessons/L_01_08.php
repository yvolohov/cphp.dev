<?php

namespace Lessons\L_01_08;

/* 1.8 Строковые операторы - конкатенация и
 * сокращенная форма конкатенации */
function stringOperators()
{
    // конкатенация
    $phrase1 = 'hello ' . 'world ' . '!!!';

    // сокращенная форма конкатенации
    $phrase2 = 'HELLO ';
    $phrase2 .= 'WORLD ';
    $phrase2 .= '!!!';

    echo "{$phrase1}\n{$phrase2}\n";
}