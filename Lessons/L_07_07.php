<?php

namespace Lessons\L_07_07;

class DogTag
{
    public $words;
}

class DogOne
{
    public $name;
    public $dogTag;

    /* конструктор это функция, которая вызывается при
     * создании экземпляра класса и обычно используется
     * для инициализации свойств класса */
    public function __construct($dogName) {
        print "создание собаки: {$dogName} \n";
        $this->name = $dogName;
        $this->dogTag = new DogTag();
        $this->dogTag->words = "Меня зовут {$dogName}. Если вы нашли меня, позвоните 555-1234 \n";
    }

    public function bark() {
        print "Гав!\n";
    }
}

/* 7.7 Конструктор это функция, которая вызывается при создании экземпляра класса и обычно используется
 * для инициализации свойств класса. Деструктор это функция, которая вызывается при
 * удалении экземпляра класса и обычно используется для освобождения памяти занятой ресурсами,
 * разрыва соединения с БД и т.д. */
function constructorsAndDestructors()
{
    $poppy = new DogOne("Poppy");
    echo $poppy->dogTag->words;
    $poppy->bark();
}