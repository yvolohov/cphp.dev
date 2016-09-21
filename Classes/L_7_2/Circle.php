<?php

namespace Classes\L_7_2;

/* Для определения нового класса используем ключевое слово class */
use Symfony\Component\Finder\Expression\Expression;

class Circle
{
    /* Член класса-константа определяется ключевым словом const.
     * Здесь нельзя использовать функцию define */
    const PI = 3.1415;

    /* Член класса-свойство (переменная). */
    public $radius = 0;

    /* Член-класса метод (функция). */
    public function getArea()
    {
        return self::PI * ($this->radius * $this->radius);
    }
}