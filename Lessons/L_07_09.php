<?php

namespace Lessons\L_07_09;

/* 7.9 Методы это функции класса */
function methods()
{
    $poppy = new Dog('Poppy');
    $poppy->bark();
    $poppy->run();

    /* Эти методы нельзя вызывать извне класса так как один из них
     * приватный а другой защищенный */
    //$poppy->sleep();
    //$poppy->eat();

    /* Вызовем их через публичный метод testMethods() */
    $poppy->testMethods();
}

class Dog
{
    private $name = '';

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function bark()
    {
        echo "{$this->name} is barking !!!\n";
    }

    /* Если не указан модификатор доступа, то функция считается публичной */
    function run()
    {
        echo "{$this->name} is running !!!\n";
    }

    public function testMethods()
    {
        $this->sleep();
        $this->eat();
    }

    protected function sleep()
    {
        echo "{$this->name} is sleeping !!!\n";
    }

    private function eat()
    {
        echo "{$this->name} is eating !!!\n";
    }
}