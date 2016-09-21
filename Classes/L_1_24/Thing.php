<?php

namespace Classes\L_1_24;

class Thing
{
    public function get()
    {
        // полное имя текущего класса (включая пространство имен)
        echo '__CLASS__ = ' . __CLASS__ . PHP_EOL;

        // полное имя текущего метода (включая пространство имен и класс)
        echo '__METHOD__ = ' . __METHOD__ . PHP_EOL;
    }
}
