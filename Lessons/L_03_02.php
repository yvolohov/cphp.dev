<?php

namespace Lessons\L_03_02;

/* 3.2 Пример Heredoc-синтаксиса */
function heredocSyntax()
{
    /* Во избежание проблем идентификаторы Heredoc и Nowdoc
     * нужно ВСЕГДА располагать с новой строки а после них
     * делать переход на следующую строку */

    $v = 'value';
    $str = <<<"HDID"

Это Heredoc строка. Она начинается с символов <<<, затем следует идентификатор, который может быть окружен двойными
кавычками. В конце строки тоже находится идентификатор без кавычек.
Heredoc поддерживает вставку переменных {$v} и все спецсимволы, которые поддерживает
строка в двойных кавычках: табуляцию \t, перевод строки \n, доллар $, слеш \\, символы ASCII \x41, а также
кавычки двойные и одинарные '". Причем кавычки не нужно экранировать.

HDID;

    echo  $str, PHP_EOL;
}