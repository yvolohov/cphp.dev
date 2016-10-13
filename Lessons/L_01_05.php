<?php

namespace Lessons\L_01_05;

/* 1.5 Побитовые операторы */
function bitwiseOperators()
{
    $and = decbin(bindec('1100') & bindec('1010')); // 1000
    $or = decbin(bindec('1100') | bindec('1010')); // 1110
    $xor = decbin(bindec('1100') ^ bindec('1010')); // 0110
    $not = decbin(~bindec('11111111')); // 00000000

    echo "and = {$and}; or = {$or}; xor = {$xor}; not = {$not};", PHP_EOL;

    $lshift = decbin(bindec('11111111') << 2); // 1111111100
    $rshift = decbin(bindec('11111111') >> 2); // 111111

    echo "left shift = {$lshift}; right shift = {$rshift};", PHP_EOL;
}