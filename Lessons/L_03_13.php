<?php

namespace Lessons\L_03_13;

/* 3.13 Многобайтовые кодировки. Важно !!! mb_string это модуль расширения. Его нужно
 * подключать в конфигурационных файлах PHP. По умолчанию он недоступен. */
function encodings()
{
    /* Стандартные строковые функции при работе с многобайтовыми
     * кодировками работают неправильно. Например функция strlen
     * не сможет корректно посчитать длину строки на кириллице.  */
    $length1 = strlen("Это строка на кириллице !!!"); // возвратит 47 символов, неправильный результат

    /* Для работы с многобайтвыми кодировками существуют специальные mb_ функции */
    $length2 = mb_strlen("Это строка на кириллице !!!", "UTF8");

    echo "length1 = {$length1}; length2 = {$length2};", PHP_EOL; // возвратит 27 символов, правильный результат

    /* mb_check_encoding — Проверяет, что кодировка для строки выбрана верно
     * В примере ниже ASCII не подходит для кириллицы, но UTF8 подходит */
    $result1 = mb_check_encoding("Это строка на кириллице !!!", "ASCII");
    $result2 = mb_check_encoding("Это строка на кириллице !!!", "UTF8");

    echo "result1 = {$result1}; result2 = {$result2};", PHP_EOL;
}