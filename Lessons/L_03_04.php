<?php

namespace Lessons\L_03_04;

/* 3.4 Получение подстроки из строки */
function subStrings()
{
    $stringOne = 'function substr() returns a substring of the string';
    $substrOne = substr($stringOne, 0, 8); // возвратит 8 символов начиная с позиции 0 (т.е. слово function)
    $substrTwo = substr($stringOne, 18); // возвратит все символы начиная с позиции 18 и до конца строки
    $substrThree = substr($stringOne, 100); // возвратит False, потому что позиция 100 слишком большая для этой строки

    echo $substrOne, PHP_EOL;
    echo $substrTwo, PHP_EOL;

    if (!$substrThree) {
        echo 'string is too short', PHP_EOL;
    }

    /* Так можно обращаться к отдельным символам */
    echo $stringOne{0} . $stringOne{1} . $stringOne{2} . $stringOne{3} . PHP_EOL; // выведет func
}