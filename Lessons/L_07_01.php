<?php

namespace Lessons\L_07_01;

/* 7.1 Здесь описаны некоторые магические методы, отрабатывающие
 * при разных операциях над объектом */
function objects()
{
    _convertingObjectsToStrings();
    _cloningObjects();
    _serializingObjects();
}

/* Здесь мы создаем свое строчное представление объекта,
 * переопределив его магический метод __toString() */
function _convertingObjectsToStrings()
{
    $c1 = new Can();
    $c1->color = 'Red';
    $c1->capacity = 0.33;
    $c2 = new Can();
    $c2->color = 'Green';
    $c2->capacity = 0.5;

    /* с таким объектом можно работать как со строкой,
     * в том числе и передавать его в функции, обрабатывающие
     * строки */
    echo $c1 . PHP_EOL . $c2 . PHP_EOL;
}

/* Здесь мы клонируем объекты с помощью ключевого слова clone.
 * При создании новой копии объекта у нее срабатывает не конструктор, а
 * клонировщик - магический метод __clone() */
function _cloningObjects()
{
    $i1 = new ClonedItem();
    $i2 = new ClonedItem();

    /* клонирование выполняется ключевым словом clone */
    $i3 = clone $i2;
    $i4 = clone $i1;

    echo 'Количество экземпляров ClonedItem: ' . ClonedItem::$instances . PHP_EOL;
}

/* Здесь мы сериализируем объект с посощью функций serialize() и unserialize().
 * Соответсвенно срабатывают магические методы __sleep() и _wakeup() */
function _serializingObjects()
{
    $i = new SerializedItem();
    $i->number = 25;
    $i->addNumber = 110;

    /* сериализация это конвертация объекта
     * в специальный строчный формат, который затем можно
     * записать в файл, базу данных или отдать как ответ на запрос */
    $si = serialize($i);
    echo "{$si}\n";

    /* после сериализации уничтожаем созданный объект */
    unset($i);

    /* а затем восстанавливаем его из строки */
    $i = unserialize($si);
    $ti = print_r($i, True);
    echo "$ti\n";
}

class Can
{
    public $color = '';
    public $capacity = '';

    /* переопределив этот метод мы
     * можем формировать произвольное
     * строчное представление объекта */
    public function __toString()
    {
        return "item: can; color: {$this->color}; capacity: {$this->capacity};";
    }
}

class ClonedItem
{
    public static $instances = 0; // кранит общее количество экземпляров
    public $instance; // хнанит номер экземпляра

    public function __construct()
    {
        self::$instances++;
        $this->instance = self::$instances;
        echo "Создание экземпляра {$this->instance}\n";
    }

    /* при клонировании конструктор не выполняется,
     * вместо него выполняется клонировщик, причем уже после того
     * как объект был клонирован */
    public function __clone()
    {
        self::$instances++;
        $this->instance = self::$instances;
        echo "Создание экземпляра {$this->instance} путем клонирования\n";
    }
}

class SerializedItem
{
    public $number = 0;
    public $addNumber = 0;

    /* Конструктор не выполняется при десериализации */
    public function __construct()
    {
        echo "Выполняется создание объекта\n";
    }

    /* Этот метод срабатывает при сериализации и должен
     * возвращать массив с названиями полей, которые нужно
     * сериализировать */
    public function __sleep()
    {
        echo "Выполняется сериализация\n";
        return array('number'); // поле addNumber не сериализируется
    }

    /* Этот метод срабатывает при десериализации и нужен
     * для выполнения различных вспомогательных функций */
    public function __wakeup()
    {
        echo "Выполняется десериализация\n";
    }
}