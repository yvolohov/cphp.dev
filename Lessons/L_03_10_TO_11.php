<?php

namespace Lessons\L_03_10_TO_11;

/* 3.10, 3.11 Форматированный вывод и символы форматирования */
function formattingOutput()
{
    $stringOne = "Today is %d%s of %s %d\n";

    /* printf выводит форматированную строку */
    printf($stringOne, 18, 'th', 'October', 2016);

    /* sprintf возвращает форматированную строку */
    echo sprintf($stringOne, 18, 'th', 'October', 2016);

    /* vprintf выводит форматированную строку, параметры принимает как массив */
    vprintf($stringOne, [18, 'th', 'October', 2016]);

    /* vsprintf возвращает форматированную строку, параметры принимает как массив */
    echo vsprintf($stringOne, [18, 'th', 'October', 2016]);

    /* fprintf предназначена для записи отформатированной строки в файл,
     * демонстрация здесь невозможна */

    /* Вывод десятичных дробей */
    $pi = 3.1415;
    $stringTwo = "PI is %f\n";
    printf($stringTwo, $pi);

    /* Ограничиваем количество разрядов */
    $stringThree = "PI is %.2f\n";
    printf($stringThree, $pi);

    /* Ограничиваем разрядность целого числа */
    $citizens = 320;
    $stringFour = "There is %08d citizens\n";
    printf($stringFour, $citizens);
}