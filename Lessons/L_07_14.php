<?php

namespace Lessons\L_07_14;

/* 7.14 Константы классов и интерфейсов */
function classConstants()
{
    /* доступ к константам извне класса */
    echo "Dog's color: ", Dog::COLOR, PHP_EOL;
    echo "Barking frequency: ", Dog::FREQUENCY, PHP_EOL;
    echo "Barking frequency: ", Barkable::FREQUENCY, PHP_EOL;

    $dog = new Dog();
    $dog->test();
}

class Dog implements Barkable
{
    /* Все константы класса являются публичными и применять модификаторы доступа к ним нельзя.
     * Однако начиная с PHP 7.1 применение модификаторов доступа к константам уже возможно. */
    const COLOR = 'brown';

    public function test()
    {
        /* доступ к константам изнутри класса через ключевое слово self */
        echo "Dog's color: ", self::COLOR, PHP_EOL;
        echo "Barking frequency: ", self::FREQUENCY, PHP_EOL;
        echo "Barking frequency: ", self::FREQUENCY, PHP_EOL;
    }
}

interface Barkable
{
    const FREQUENCY = 'always';

    /* константы класса нельзя добавлять функцией define() */
    // define('NAME', 'Bobby');
}