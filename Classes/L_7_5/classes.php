<?php

namespace Classes\L_7_5;

/* Мы определяем интерфейс с помощью соответствующего ключевого слова interface */
interface Boat
{
    /* Все методы интерфейса являются публичными. Причем ключевое слово public указывать не обязательно.
     * Учитывая правило равного или более свободного доступа, переопределить (реализовать) метод интерфейса может
     * тоже только публичный метод.
     * Учитывая, что private и protected методы относятся к реализации, то они не могут быть описаны
     * через интерфейс. */
    public function sink();
    public function scuttle();
    public function dock();

    public function fill();
}

interface Moving {}

interface Flying {}

/* Интерфейс может наследовать один или несколько других интерфейсов. Для этого
 * используется ключевое слово extends */
interface Plane extends Flying, Moving
{
    /* Ключевое слово public указывать не обязательно */
    function takeoff();
    function land();

    public function fill();

    /* Модификаторы abstract и final не применяются в интерфейсах.
     * Они просто не имеют смысла так как методы интерфейсов и так
     * абстрактные, а запрет на переопределение метода интерфейса делает его
     * неработоспособным. */
    public static function doSomething();
}

/* Реализуемые интерфейсы описываются ключевым словом implements.
 * Класс может реализовать несколько интерфейсов. */
class Boatplane implements Boat, Plane
{
    public function sink() {echo "Boatplane is sinking !!!\n";}

    public function scuttle() {echo "Boatplane is scuttling !!!\n";}

    public function dock() {echo "Boatplane is docking !!!\n";}

    public function takeoff() {echo "Boatplane is taking off !!!\n";}

    public function land() {echo "Boatplane is landing !!!\n";}

    /* Класс может реализовать метод, который присутствует в нескольких интерфейсах.
     * Конфликта не возникнет, если у методов совпадают синатуры (количество параметров)*/
    public function fill() {echo "I fill the boatplane !!!\n";}

    public static function doSomething() {echo "I'm doing something !!!\n";}
}