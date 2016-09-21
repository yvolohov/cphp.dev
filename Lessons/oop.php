<?php

namespace Lessons\OOP;

use Classes\L_7_2;
use Classes\L_7_3;
use Classes\L_7_4;

/* 7.2 Класс это шаблон для создания объекта, который описывает характеристики объекта, его константы,
 * свойства и методы. Нельзя создавать объекты прежде чем был описан класс. */
function creatingClassesAndInstantiation()
{
    /* Новый экземпляр класса создается при помощи ключевого слова new */
    $circle = new L_7_2\Circle();

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

/* 7.3 Наследование - создание классов на основе других классов. При этом класс-потомок получает
 * свойства и методы класса-предка. */
function inheritance()
{
    $poodle = new L_7_3\Poodle();
    $poodle->bark();
    $poodle->run();
    $poodle->play('');
}

/* 7.4 Абстрактный класс не предназначен для создания экземпляров. По сути это скелетон
 * с частичным функционалом, который будет окончательно реализован в классах-потомках.
 * Таким образом абстрактный класс предназначен исключительно для наследования. */
function abstractClasses()
{
    /* абстрактные классы нельзя инстанциировать */
    //$poppy = new L_7_4\Dog();

    /* но можно инстанциировать их потомков */
    $poppy = new L_7_4\EnglishPoodle();
    $poppy->bark();
    $poppy->run();
    $poppy->sleep();
}