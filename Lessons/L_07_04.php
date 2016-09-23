<?php

namespace Lessons\L_07_04;

/* абстрактный класс может не иметь абстрактных методов */
abstract class Dog
{
    public function bark()
    {
        print("Bark!\n");
    }
}

abstract class Poodle extends Dog
{
    /* Если внутри класса есть хоть один абстракный метод,
     * класс тоже должен быть объявлен как абстрактный. Однако
     * это односторонняя зависимость. Т.е. могут существовать
     * абстрактные классы без абстрактных методов */
    abstract public function run();

    abstract protected function sleep();
}

class EnglishPoodle extends Poodle
{
    public function run() {
        print "I'm running!\n";
    }

    /* При переопределении следует учитывать, что свойство или метод класса-потомка не
     * могут иметь более строгий уровень доступа, чем аналогичное свойство или метод класса-предка.
     * Т.е. public может переопределить private или protected, но не наоборот. */
    //private function sleep() {} // переопределение невозможно, private не может переопределить protected
    public function sleep() // переопределение возможно, public может переопределить protected
    {
        print "I'm sleeping!\n";
    }
}

/* 7.4 Абстрактный класс не предназначен для создания экземпляров. По сути это скелетон
 * с частичным функционалом, который будет окончательно реализован в классах-потомках.
 * Таким образом абстрактный класс предназначен исключительно для наследования. */
function abstractClasses()
{
    /* абстрактные классы нельзя инстанциировать */
    //$poppy = new L_7_4\Dog();

    /* но можно инстанциировать их потомков */
    $poppy = new EnglishPoodle();
    $poppy->bark();
    $poppy->run();
    $poppy->sleep();
}