<?php

namespace Lessons\L_03_05;

/* 3.5 Поиск подстроки в строке, возвращается позиция первого вхождения */
function locatingStrings()
{
    $positionOne = strpos('Coca Cola', 'Cola'); // вернет 5, потому что Cola находится на пятой позиции, начиная с нуля

    /* В качестве третьего параметра можно указать позицию,
     * с которой нужно начинать поиск. В этом случае
     * часть строки может быть проигнорирована */
    $positionTwo = strpos('Cola Coca Cola', 'Cola', 5); // вернет 10, первое вхождение Cola будет пропущено

    /* Если подстрока не найдена, возвращает False */
    $positionThree = strpos('Coca Cola', 'Kola'); // вернет False т.к. подстрока не найдена

    echo $positionOne, PHP_EOL;
    echo $positionTwo, PHP_EOL;

    /* Здесь проверяем на идентичность, потому что
     * функция может вернуть как 0 так и False */
    if ($positionThree === False) {
        echo 'substring not found', PHP_EOL;
    }
}