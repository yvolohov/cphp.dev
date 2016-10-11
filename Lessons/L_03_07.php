<?php

namespace Lessons\L_03_07;

/* 3.7 Подсчет количества слов и символов в строке */
function countingStrings()
{
    $str = 'PHP means Hypertext Preprocessor';
    $len = strlen($str); // получаем количество символов
    $wordsCount = str_word_count($str); // получаем количество слов
    $words = str_word_count($str, True); // получаем массив со словами

    echo "string = {$str}; length = {$len}; words count = {$wordsCount};", PHP_EOL;
    echo print_r($words, True), PHP_EOL;
}