<?php

namespace Lessons\L_07_02;

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

/* 7.2 Класс это шаблон для создания объекта, который описывает характеристики объекта, его константы,
 * свойства и методы. Нельзя создавать объекты прежде чем был описан класс. */
function creatingClassesAndInstantiation()
{
    /* Новый экземпляр класса создается при помощи ключевого слова new */
    $circle = new Circle();

    /* После создания объекта мы можем обращаться к его свойствам или методам. */
    $circle->radius = 5;
    $area = $circle->getArea();
    echo "area = {$area};\n";

    /* Передача объекта в функцию происходит по ссылке. */
    echo "old radius = {$circle->radius}\n";

    $testLocalCircle = function($localCircle) {$localCircle->radius = 7;};
    $testLocalCircle($circle);

    echo "new radius = {$circle->radius}\n";

    /* Нельзя создать экземпляр класса до определения самого класса. Код ниже вызовет ошибку. */
    // $e = new Example();
    // class Example {}
}