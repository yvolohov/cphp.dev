<?php

namespace Classes\L_7_3;

class Dog
{
    public $name;

    public function bark()
    {
        print("Bark!\n");
    }

    final public function run()
    {
        print("I'm running!\n");
    }

    public function play($where, $when)
    {
        print("I'm playing!\n");
    }
}