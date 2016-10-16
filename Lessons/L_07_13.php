<?php

namespace Lessons\L_07_13;

/* 7.13 Контроль типа объекта при передаче его
 * как параметра в функцию */
function typeHinting()
{
    $poppy = new Dog();
    $penny = new Poodle();
    $max = new Cat();

    /* Контроль типа применим только к объектам.
     * Нельзя установить контроль типа для строк, чисел
     * и других примитивных типов */
    function prepareDog(Dog $dog) {
        echo "Dog is prepared!\n";
    }

    /* Контроль типа возможен не только по классам,
     * но и по интерфейсам */
    function prepareRunnable(Runnable $runnable) {
        echo "Runnable is prepared!\n";
    }

    prepareDog($poppy);
    prepareDog($penny); // $penny is instance of Poodle, Poodle is Dog
    prepareRunnable($penny);

    /* передача объекта другого типа вызовет ошибку */
    // prepareDog($max);

    /* передача примитивного типа тоже вызовет ошибку */
    // prepareDog('Dog');

    /* существует Type Hint для массивов */
    function prepareArray(Array $array) {
        echo "Array is prepared!\n";
    }

    prepareArray(['a', 'b', 'c']);
}

interface Runnable {}
class Dog {}
class Poodle extends Dog implements Runnable {}
class Cat {}