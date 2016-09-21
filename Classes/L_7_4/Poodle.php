<?php

namespace Classes\L_7_4;

abstract class Poodle extends Dog
{
    /* Если внутри класса есть хоть один абстракный метод,
     * класс тоже должен быть объявлен как абстрактный. Однако
     * это односторонняя зависимость. Т.е. могут существовать
     * абстрактные классы без абстрактных методов */
    abstract public function run();

    abstract protected function sleep();
}