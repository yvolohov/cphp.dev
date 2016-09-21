<?php

namespace Classes\L_7_4;

class EnglishPoodle extends Poodle
{
    public function run() {
        print "I'm running!\n";
    }

    /* При переопределении следует учитывать, что свойство или метод класса-потомка не
     * могут иметь более строгий уровень доступа, чем аналогичное свойство или метод класса-предка.
     * Т.е. public может переопределить private или protected, но не наоборот. */
    //private function sleep() {} // переопределение невозможно, private не может переопределить protected
    public function sleep() // переопределение возможно, public может переопределить protected
    {
        print "I'm sleeping!\n";
    }
}