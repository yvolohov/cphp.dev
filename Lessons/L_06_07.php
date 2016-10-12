<?php

namespace Lessons\L_06_07;

/* 6.7 Анонимные функции (замыкания) */
function anonymousFunctions()
{
    /* простая анонимная функция, вычисляющая сумму чисел */
    $add = function($a, $b) {return $a + $b;};
    echo 'result add = ', $add(3, 5), PHP_EOL;

    /* функция наследующая переменные из родительской области видимости */
    $name = 'Yaroslav';
    $showNameOne = function() use ($name) {echo 'Hello ' . $name . PHP_EOL;};
    $showNameOne();

    /* здесь мы видим, что даже после того, как функция returnClosureOne отработала
     * и ее локальные переменные уничтожены, созданная внутри нее и переданная в замыкание
     * переменная $name (экземпляр класса Name) продолжает существовать */
    $showNameTwo = returnClosureOne();
    $showNameTwo(); // выведет Hello Andrew

    /* однако попытавшись передать объект в замыкание не через ключевое слово use а через
     * параметры функции, мы получаем Null */
    //$showNameThree = returnClosureTwo();
    //$showNameThree(); // выведет просто Hello, без Vasily

    /* Отсюда вывод, передавать в замыкание объекты и примитивы по ссылке
     * нужно через ключевое слово use
     * Через параметры функции можно передавать только примитивы по значению */

    /* существует специальный Type Hint для Closure */
    setClosure($showNameTwo);
}

/* пример Type Hint для Closure */
function setClosure(\Closure $c)
{
    echo print_r($c, True) . PHP_EOL;
}

function returnClosureOne()
{
    class NameOne
    {
        public $name;
    }

    $name = new NameOne();
    $name->name = 'Andrew';

    // передаем объект в замыкание через use, чтобы он продолжил существовать
    // даже когда функция returnClosureOne уже отработает
    return function() use ($name) {echo 'Hello ' . $name->name . PHP_EOL;};
}

function returnClosureTwo()
{
    class NameTwo
    {
        public $name;
    }

    $name = new NameTwo();
    $name->name = 'Vasily';

    return function($name) {echo 'Hello ' . $name->name . PHP_EOL;};
}