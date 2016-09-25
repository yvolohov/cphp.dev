<?php

namespace Lessons\L_06_05;

$countryThree = 'China';

/* 6.5 Из функции можно получить доступ к глобальным переменным (они объявлены в файле service.php) */
function variableScope()
{
    /* Первый способ, использовать ключевое слово global. */
    global $countryOne, $countryTwo, $countryThree;
    echo "countryOne = {$countryOne}; countryTwo = {$countryTwo}; countryThree = {$countryThree};\n";

    /* Второй способ, использовать массив $GLOBALS. Однако ни первый ни второй способы
     * не работают для переменной, которая объявлена не в глобальной области а в неймспейсе,
     * как countryThree (возможно в неймспейсах вообще нельзя объявлять переменные ???). */
    echo "countryOne = {$GLOBALS['countryOne']}; countryTwo = {$GLOBALS['countryTwo']}; " .
        " countryThree = {$GLOBALS['countryThree']};\n";

    /* Локальные перменные, объявленные в функции, доступны только в этой функции */
    $countryFour = 'Japan';
    echo "countryFour = {$countryFour};\n";
}