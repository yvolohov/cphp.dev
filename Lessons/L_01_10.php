<?php

namespace Lessons\L_01_10;

/* 1.10 Логические операторы */
function logicalOperators()
{
    /* два различных варианта and и or (&& и ||)
     * различаются приоритетом операторов */

    // AND если истинны оба операнда
    $and1 = True and True;
    $and2 = True && True;

    // OR если истинны оба операнда или хоть один из них
    $or1 = True or True;
    $or2 = True || False;

    // XOR если истинный один из операндов а другой нет
    $xor = True xor False;
    // для xor нет символьного аналога ^^

    // NOT
    $not = ! False;
    // для ! нет зарезервированного слова not

    echo "and1 = {$and1}; and2 = {$and2}; or1 = {$or1}; or2 = {$or2}; xor = {$xor}; not = {$not};\n";
}