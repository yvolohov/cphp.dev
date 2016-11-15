<?php

namespace Lessons\L_07_19;

/* 7.19 Трейты это способ множественного наследования */
function traits()
{
    /* Трейты нельзя инстанциировать, в этом смысле они
     * похожи на абстрактный класс */
    // $a = new Addition();

    $o = new Operations();
    $o->a = 3;
    $o->b = 4;

    echo 'Add: ', $o->add(), PHP_EOL;
    echo 'Sub: ', $o->sub(), PHP_EOL;
    echo 'Mul: ', $o->mul(), PHP_EOL;
}

class Operations
{
    /* Указываем, какие трейты может использовать класс, также
     * можем изменить область видимости конкретных методов */
    use Addition, Subtraction, Multiplication {mul as public;}
}


trait Addition
{
    public $a;
    public $b;

    public function add()
    {
        return $this->a + $this->b;
    }
}

trait Subtraction
{
    public $a;
    public $b;

    public function sub()
    {
        return $this->a - $this->b;
    }
}

trait Multiplication
{
    public $a;
    public $b;

    private function mul()
    {
        return $this->a * $this->b;
    }
}