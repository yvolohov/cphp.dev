<?php

namespace Lessons\L_03_03;

/* 3.3 Пример Nowdoc-синтаксиса */
function nowdocSyntax()
{
    /* Во избежание проблем идентификаторы Heredoc и Nowdoc
     * нужно ВСЕГДА располагать с новой строки а после них
     * делать переход на следующую строку */

    $v = 'value';
    $str = <<<'HDID'

Это Nowdoc строка. Она начинается с символов <<<, затем следует идентификатор окруженный одинарными кавычками.
В конце строки тоже находится идентификатор без кавычек. Nowdoc не поддерживает вставку переменных {$v} и спецсимволы.
Nowdoc поддерживает кавычки '" и их не нужно экранировать.

HDID;

    echo $str, PHP_EOL;
}