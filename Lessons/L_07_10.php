<?php

namespace Lessons\L_07_10;

/* 7.10 Статические свойства и методы */
function staticPropertiesAndMethods()
{
    $dog = new Dog();

    /* Обычный метод может быть вызван только из экземпляра */
    $dog->instanceTest();

    /* Статический метод может быть вызван как из класса, так и из экземпляра */
    $dog->classTest();
    Dog::classTest();
}

class Dog
{
    public $barkingCounter = 0;
    public static $runningCounter = 0;

    public function bark()
    {
        echo "Dog is barking !!!\n";
    }

    public static function run()
    {
        echo "Dog is running !!!\n";
    }

    public function instanceTest()
    {
        $this->bark(); // вызываем обычный метод
        $this->barkingCounter++; // обращаемся к обычному свойству

        self::run(); // вызываем статический метод
        self::$runningCounter++; // обращаемся к статическому свойству
    }

    public static function classTest()
    {
        /* мы не можем вызвать обычный метод или обратится к
         * обычному свойству в статическом контексте,
         * класс ничего не знает о своих экземплярах */
        // $this->bark();
        // $this->barkingCounter++;

        /* однако статический метод вызывается без проблем */
        self::run();
        self::$runningCounter++; // обращаемся к статическому свойству
    }
}

