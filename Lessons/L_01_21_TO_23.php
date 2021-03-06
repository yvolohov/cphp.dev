<?php

namespace Lessons\L_01_21_TO_23;

const CON_COLOR = 'RED';
define('CON_WEIGHT', 22);

/* 1.21, 1.22, 1.23 Константы похожи на переменные, за исключением того,
 * что их значение можно определить только один раз (при создании) и
 * больше нельзя изменять. Константы определяются функцией define, либо
 * с помощью ключевого слова const. Однако const нельзя
 * использовать внутри функций а define для объявления констант класса. */
function constants()
{
    //const CON_WIDTH = 75; // внутри функций этот способ недоступен
    define('CON_HEIGHT', 44);

    /* Константы доступны в любом контексте в любом месте программы */
    echo CON_COLOR, '; ', CON_WEIGHT, '; ', CON_HEIGHT, ";\n";

    /* Правила именования констант такие-же как и для переменных, за исключением того,
     * что не используется знак доллара как первый символ.
     * Константы так же регистрозависимы, как и переменные. */
    define('con_height', 33);
    echo con_height, '; ', CON_HEIGHT, ";\n";
}