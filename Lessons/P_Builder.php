<?php

namespace Lessons\P_Builder;

/* Порождающий шаблон проектирования Builder (строитель) */
function testBuilder()
{
    /* Паттерн отделяет логику построения сложного объекта от самого объекта */
    $businessClassTicketBuilder = new BusinessClassTicketBuilder();
    $economicClassTicketBuilder = new EconomicClassTicketBuilder();
    $ticketDirector = new TicketDirector();

    /* Создаем билет бизнес-класса */
    $ticketDirector->setBuilder($businessClassTicketBuilder);
    $ticketDirector->createTicket();
    $businessClassTicket = $ticketDirector->getTicket();

    /* Создаем бидет эконом-класса */
    $ticketDirector->setBuilder($economicClassTicketBuilder);
    $ticketDirector->createTicket();
    $economicClassTicket = $ticketDirector->getTicket();

    echo 'Tickets built', PHP_EOL;
}

/* Класс билета */
class PlaneTicket
{
    private $class = '';
    private $luggage = '';
    private $breakfast = '';
    private $price = 0;

    public function getClass()
    {
        return $this->class;
    }

    public function setClass($class)
    {
        $this->class = $class;
    }

    public function getLuggage()
    {
        return $this->luggage;
    }

    public function setLuggage($luggage)
    {
        $this->luggage = $luggage;
    }

    public function getBreakfast()
    {
        return $this->breakfast;
    }

    public function setBreakfast($breakfast)
    {
        $this->breakfast = $breakfast;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}

/* Абстрактный построитель */
abstract class TicketBuilder
{
    protected $planeTicket;

    public function getTicket()
    {
        return $this->planeTicket;
    }

    public function createNewTicket()
    {
        $this->planeTicket = new PlaneTicket();
    }

    abstract public function buildClass();
    abstract public function buildLuggage();
    abstract public function buildBreakfast();
    abstract public function buildPrice();
}

/* Построитель билета бизнес-класса */
class BusinessClassTicketBuilder extends TicketBuilder
{
    public function buildClass()
    {
        $this->planeTicket->setClass('Business');
    }

    public function buildLuggage()
    {
        $this->planeTicket->setLuggage('100 kg');
    }

    public function buildBreakfast()
    {
        $this->planeTicket->setBreakfast('included');
    }

    public function buildPrice()
    {
        $this->planeTicket->setPrice(700);
    }
}

/* Построитель билета эконом-класса */
class EconomicClassTicketBuilder extends TicketBuilder
{
    public function buildClass()
    {
        $this->planeTicket->setClass('Economic');
    }

    public function buildLuggage()
    {
        $this->planeTicket->setLuggage('50 kg');
    }

    public function buildBreakfast()
    {
        $this->planeTicket->setBreakfast('require an order');
    }

    public function buildPrice()
    {
        $this->planeTicket->setPrice(350);
    }
}

/* Управлет процессом построения билета */
class TicketDirector
{
    private $ticketBuilder;

    public function setBuilder(TicketBuilder $ticketBuilder)
    {
        $this->ticketBuilder = $ticketBuilder;
    }

    public function createTicket()
    {
        $this->ticketBuilder->createNewTicket(); // создание происходит здесь
        $this->ticketBuilder->buildClass();
        $this->ticketBuilder->buildLuggage();
        $this->ticketBuilder->buildBreakfast();
        $this->ticketBuilder->buildPrice();
    }

    public function getTicket()
    {
        $this->ticketBuilder->getTicket();
    }
}