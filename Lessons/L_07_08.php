<?php

namespace Lessons\L_07_08;

/* 7.8 Свойства это переменные класса */
function properties()
{
    $poppy = new Poodle();
    $penny = new Poodle();

    /* Публичные свойства можно устанавливать или получать везде, в том числе и вне класса. */
    $poppy->name = 'Poppy';
    $penny->name = 'Penny';

    /* Приватные или защищенные свойства нельзя устанавливать или получать вне класса,
     * поэтому мы работаем с ними через методы. */
    $poppy->setOwnersPhone('11110000');
    $poppy->setId('1');
    $penny->setOwnersPhone('22220000');
    $penny->setId('2');

    echo $poppy->getId() . ' ' . $poppy->name . ' ' . $poppy->getOwnersPhone() . PHP_EOL;
    echo $penny->getId() . ' ' . $penny->name . ' ' . $penny->getOwnersPhone() . PHP_EOL;
}

class Dog
{
    /* Свойства могут быть приватными, защищенными и публичными.
     * Свойства можно инициализировать как переменные */
    private $id = '';
    protected $ownersPhone;
    public $name = '';

    /* Доступ к приватным свойствам возможен только внутри своего класса,
     * получать или устанавливать их можно только через методы класса */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}

class Poodle extends Dog
{
    /* Доступ к защищенным свойствам возможен либо внутри своего класса,
     * либо внутри класса-потомка */
    public function setOwnersPhone($ownersPhone)
    {
        $this->ownersPhone = $ownersPhone;
    }

    public function getOwnersPhone()
    {
        return $this->ownersPhone;
    }
}