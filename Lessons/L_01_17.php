<?php

namespace Lessons\L_01_17;

/* 1.17 Циклы, конструкции позволяющие выполнять один и тот же код множество раз.
 * В большинстве циклов на каждом витке меняются значения некоторых переменных, в итоге
 * один виток отличается от другого. */
function loops()
{
    _controlStructuresLoopsWhile();
    _controlStructuresLoopsDoWhile();
    _controlStructuresLoopsFor();
    _controlStructuresForeach();
    _controlStructuresContinueBreak();
}

/* While - цикл с предусловием */
function _controlStructuresLoopsWhile()
{
    $i = 0;
    $si = "While: ";

    while ($i < 10) {
        $si .= "{$i}; ";
        $i++;
    }

    echo "{$si}\n"; // вывод от 0 до 9
}

/* Do While - цикл с постусловием */
function _controlStructuresLoopsDoWhile()
{
    /* Цикл while с постусловием всегда выполняется минимум один раз */
    $i = 20;
    $si = "Do While: ";

    do {
        $si .= "{$i}; ";
        $i++;
    }
    while ($i < 10);

    echo "{$si}\n"; // вывод числа 20, несмотря на то, что оно не соответсвует условию
}

/* For - цикл со счетчиком */
function _controlStructuresLoopsFor()
{
    $si = "For (normal): ";

    /* Нормальный for */
    for ($i = 0; $i < 10; $i++) {
        $si .= "{$i}; ";
    }

    echo "{$si}\n"; // Вывод 0 .. 9

    $si = "For (1st counter): ";
    $sj = "For (2nd counter): ";

    /* С двумя счетчиками в плюс и в минус */
    for ($i = 0, $j = 0; $i < 10; $i++, $j--) {
        $si .= "{$i}; ";
        $sj .= "{$j}; ";
    }

    echo "{$si}\n"; // Вывод 0 .. 9
    echo "{$sj}\n"; // Вывод 0 .. -9

    $si = "For (infinite): ";

    /* Бесконечный (с прерыванием) */
    for(;;) {
        $si .= "infinity; ";
        break;
    }

    echo "{$si}\n";
}

/* Foreach - цикл для обхода массивов и объектов */
function _controlStructuresForeach()
{
    $a = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'];

    /* цикл для обхода любых массивов и получения значений */
    foreach ($a as $value) {
        echo $value, '; ';
    }

    echo PHP_EOL;

    /* цикл для обхода любых массивов и получения пар ключ-значение */
    foreach ($a as $key => $value) {
        echo $key, ' ', $value, '; ';
    }

    echo PHP_EOL;
}

/* Ключевое слово continue завершает текущий виток цикла и перебрасывает на следующий виток.
 * Ключевое слово break завершает весь цикл. */
function _controlStructuresContinueBreak()
{
    $si = "Continue, Break: ";

    /* Пример continue */
    for ($i = 0; $i < 10; $i++) {

        if ($i == 3) {
            continue;
        }

        if ($i > 7) {
            break;
        }

        $si .= "{$i}; ";
    }

    echo "{$si}\n"; // Вывод 0; 1; 2; 4; 5; 6; 7;

    /* Если циклы вложенные, то после continue и break можно указать к какому циклу относится инструкция.
     * Цифра после этих операторов указывает на номер цикла, начиная от текущего. */
    for ($i = 0; $i < 10; $i++) {
        echo "Outer starts\n";

        for ($j = 0; $j < 10; $j++) {
            echo "Inner starts\n";
            break 2;
            echo "Inner ends\n"; // это не будет выведено
        }

        echo "Outer ends\n"; // это не будет выведено
    }
}
