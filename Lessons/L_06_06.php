<?php

namespace Lessons\L_06_06;

/* 6.6 Переменные функции подобны переменным переменным */
function variableFunctions()
{
    /* Сначала присваиваем переменной полное имя функции, затем вызываем ее как функцию  */
    $func1 = __NAMESPACE__ . '\abc';
    $func1();

    /* Для методов */
    $ex = new Example();
    $func2 = 'show';
    $ex->$func2();

    /* Нельзя вызывать таким способом конструкции языка вроде echo, print, isset, unset и т.д. */
    // $func3 = 'print';
    // $func3('It\'s print !!!');

    /* Но можно вызывать встроенные функции */
    $func4 = 'str_repeat';
    $result = $func4('Yes ', 3);
    echo "str_repeat result = {$result} \n";
}

function abc()
{
    echo "It's abc !!!\n";
}

class Example
{
    function show()
    {
        echo "It's Example->show !!!\n";
    }
}