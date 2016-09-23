<?php

namespace Lessons\L_01_16;

/* 1.16 Операторы ветвления позволяют выбрать выполняемые действия в зависимости от
 * результат проверки условия. Операторов ветвления три: if, switch и тернарный оператор */
function conditions()
{
    _conditionsIf();
    _conditionsSwitch();
    _conditionsTernary();
}

function _conditionsIf()
{
    /* Оператор ветвления if состоит из трех частей if, else if, else.
     * Только первая из них обязательна, остальные опциональны. */
    $population = rand(30, 1000000);

    if ($population >= 30 && $population < 300) {
        echo "This is a little village.\n";
    }

    /* else if может писаться раздельно */
    else if ($population >=300 && $population < 1000) {
        echo "This is a big village.\n";
    }

    /* elseif может писаться слитно */
    elseif ($population >= 1000 && $population < 10000) {
        echo "This is a town.\n";
    }

    /* Если нужно выполнить всего один оператор,
     * то можно не заключать его в фигурные скобки. */
    else if ($population >= 10000 && $population < 500000)
        echo "This is a city. \n";

    /* Блок else должен быть в самом конце, после остальных условий */
    else
        echo "This is a big sity.\n";

    /* Пример опрератора ветвления if без else if и else */
    if (True) {
        echo "----------------\n";
    }
}

function _conditionsSwitch()
{
    /* Тернарный оператор похож на if-else, только значительно короче. */
    $age = rand(0, 30);
    $isChild = ($age < 16) ? "is a child\n" : "is not a child\n";
    echo $isChild;

    /* Существует также сокращенная форма тернарного оператора.
     * Если условие истинно, то возвращается оно. Иначе возвращатеся значение по умолчанию. */
    $value = (rand(0, 5)) ?: 'не выбрано';
    echo "{$value}\n";
}

function _conditionsTernary()
{
    /* switch проверяет переменную на соответсвие нескольким значениям */
    $d = 'Robert';

    switch ($d) {

        /* один обработчик для нескольких кейсов */
        case 'Robert':
        case 'Bob':
            echo 'Bob';
            break;

        /* если ни один кейс не подошел выполняется default (который может быть как в конце switch, так и нет) */
        default:
            echo 'another name';
            break;

        case 'Sally':
            echo 'Sally';
            break;
    }
}