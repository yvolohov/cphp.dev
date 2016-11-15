<?php

namespace Lessons\P_AbstractFactory;

/* Порождающий шаблон проектирования AbstractFactory (абстрактная фабрика) */
function testAbstractFactory()
{
    /* Абстрактная фабрика предоставляет интерфейс для создания похожих объектов,
     * принадлежащих к разным семействам */
    $xmlFactory = new XMLFactory();
    $xmlReader = $xmlFactory->getReader();
    $xmlWriter = $xmlFactory->getWriter();

    $jsonFactory = new JSONFactory();
    $jsonReader = $jsonFactory->getReader();
    $jsonWriter = $jsonFactory->getWriter();

    echo "Objects made", PHP_EOL;
}

/* Интерфейс, лежащий в основе паттерна */
interface IOFactory
{
    public function getReader();
    public function getWriter();
}

/* Фабрика объектов для работы с XML */
class XMLFactory implements IOFactory
{
    public function getReader()
    {
        return new XMLReader();
    }

    public function getWriter()
    {
        return new XMLWriter();
    }
}

/* Фабрика объектов для работы с JSON */
class JSONFactory implements IOFactory
{
    public function getReader()
    {
        return new JSONReader();
    }

    public function getWriter()
    {
        return new JSONWriter();
    }
}

abstract class Reader {}
class XMLReader extends Reader {}
class JSONReader extends Reader {}

abstract class Writer {}
class XMLWriter extends Writer {}
class JSONWriter extends Writer {}