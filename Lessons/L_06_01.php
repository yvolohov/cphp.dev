<?php

namespace Lessons\L_06_01;

/* 6.1 Функция это подпрограмма, блок кода, который имеет имя и
 * может использоватся многократно. Многократное использование кода
 * является крайне важным для хорошего проекта, поскольку сокращает его
 * размер, трудоемкость и время разработки, а также делает более понятным
 * (что позитивно сказывается на последжующей поддержке этого кода). */
function functionDefinition()
{
    /* Функции регистронезависимы (вот это номер, всю жизнь был убежден в обратном) */
    abc();
    Abc();
    ABC();

    /* Функции могут быть следующих типов: собственные (как эта), встроенные (входят в PHP)
     * и библиотечные (созданные сторонними разработчиками и подключенные к проекту) */
}

function abc()
{
    echo "abc\n";

    /* Внутри функций может быть любой код,
     * включая другие функции и классы */
    class Example {}
    function def() {}
}
