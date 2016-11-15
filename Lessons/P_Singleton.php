<?php

namespace Lessons\P_Singleton;

/* Порождающий шаблон проектирования Singleton (Одиночка) */
function testSingleton()
{
    /* Синглетон обеспечивает существование единого экземпляра
     * класса и единого способа доступа к нему. В данном случае
     * мы получаем доступ к данным из двух не связанных между
     * собой функций. */
    setData();
    getData();
}

/* записывает данные в синглетон */
function setData()
{
    $application = Application::getInstance();
    $application->setProgramData('This is singleton');
}

/* читает и выводит данные из синглетона */
function getData()
{
    $application = Application::getInstance();
    echo $application->getProgramData(), PHP_EOL;
}

/* Класс-синглетон, который хранит данные общие для всего приложения */
class Application
{
    /* Здесь, в статичном свойстве, хранится единственный экземпляр приложения */
    private static $applicationInstance;

    /* У синглетона приватный конструктор, поэтому его
     * экземпляр нельзя создать вне класса */
    private function __construct() {}

    /* У синглетона приватный клонировщик, поэтому его
     * нельзя клонировать вне класса */
    private function __clone() {}

    /* Этот статический метод позволяет получить единственный
     * экземпляр класса из любого места программы */
    public static function getInstance()
    {
        if (self::$applicationInstance == Null) {
            self::$applicationInstance = new Application();
        }
        return self::$applicationInstance;
    }

    /* Здесь хранятся какие-то данные приложения */
    private $programData;

    /* Геттер для данных приложения */
    public function getProgramData()
    {
        return $this->programData;
    }

    /* Сеттер для данных приложения */
    public function setProgramData($programData)
    {
        $this->programData = $programData;
    }
}