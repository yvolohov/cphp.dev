<?php

namespace Lessons\L_03_08;

/* 3.8 Фонетические функции */
function phoneticFunctions()
{
    /* Если слова звучат похоже, функция должна возвращать одинаковые ключи.
     * Однако например слова knight и night дали разные ключи, хотя звучат они
     * абсолютно одинаково. */
    $key1 = soundex('Euler');
    $key2 = soundex('Ellery');

    echo "k1 = {$key1}; k2 = {$key2}; \n";

    /* Эта функция более точна, ключи совпадают */
    $key1 = metaphone('knight');
    $key2 = metaphone('night');

    echo "k1 = {$key1}; k2 = {$key2}; \n";
}