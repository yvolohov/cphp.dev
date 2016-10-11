<?php

namespace Lessons\L_03_09;

/* 3.9 Конвертация строки в массив и массива в строку */
function stringsAndArrays()
{
    /* конвертирует строку в массив по заданной строке-разделителю */
    $arrMonths = explode(',', 'YAN,FEB,MAR,APR,MAY,JUN,JUL,AUG,SEP,OCT,NOV,DEC');

    /* собирает строку из массива с возможностью добавления разделителя */
    $strMonths = implode(';', $arrMonths);

    echo print_r($arrMonths, True), PHP_EOL;
    echo print_r($strMonths, True), PHP_EOL;
}