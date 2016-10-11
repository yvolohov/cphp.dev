<?php

namespace Lessons\L_03_01;

/* 3.1 Строки в одинарных кавычках не поддерживают переменные и
 * большинство спецсимволов (кроме ' и \). Строки в двойных кавычках поддерживают все. */
function singleAndDoubleQuotes()
{
    $myName = 'Yaroslav';

    $singleQuotesOne = 'Special chars are disabled inside single quotes string: \n \t \r';
    $singleQuotesTwo = 'Variables are disabled inside single quotes string: {$myName}';
    $singleQuotesThree = 'Only two special chars are enabled inside single quotes string: \\ \' ';
    $singleQuotesFour = 'Double quotes can be inside single quotes without escaping: "';

    $doubleQuotesOne = "Special chars and variables are enabled inside double quotes string: \t {$myName} \r {$myName}";

    echo $singleQuotesOne, PHP_EOL;
    echo $singleQuotesTwo, PHP_EOL;
    echo $singleQuotesThree, PHP_EOL;
    echo $singleQuotesFour, PHP_EOL;
    echo $doubleQuotesOne, PHP_EOL;
}