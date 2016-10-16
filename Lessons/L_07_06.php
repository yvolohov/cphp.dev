<?php

namespace Lessons\L_07_06;

/* 7.6 Исключения. Исключение это некая ошибочная ситуация, которая возникает
 * при выволненнии программы и которая может быть поймана и обработана. */
function exceptions()
{
    /* В блок try мы помещаем код, который может вызвать исключение. */
    try {
        /* ключевое слово throw вызывает (бросает) исключение */
        throw new \Exception('Ooops!!! It is Exception !!!', 666); // 300 - код исключения

        /* Если возникло исключение, код после него не выполняется.
         * Следующий код не будет вызван. */
        echo 'Some code lower exception', PHP_EOL;
    }

    /* В блок catch мы помещаем код, который обрабатывает исключение.
     * Если исключение не будет вызвано, данный блок не будут выполнен. */
    catch (\Exception $e) {
        echo 'Message: ', $e->getMessage(), PHP_EOL;
        echo 'Code: ', $e->getCode(), PHP_EOL;
        echo 'File: ', $e->getFile(), PHP_EOL;
        echo 'Line: ', $e->getLine(), PHP_EOL;
        //echo 'Trace: ', $e->getTraceAsString(), PHP_EOL;
    }

    /* Блок finally выполняется всегда, независимо от того,
     * было вызвано исключение или нет. */
    finally {
        echo 'finally operations', PHP_EOL;
    }

    echo PHP_EOL;

    /* Также мы можем создавать собственные исключения расширяя класс Exception */
    try {
        //throw new \Exception('Ooops!!! It is Exception !!!', 666);
        throw new MyException();
    }

    /* Блоков catch может быть много. При этом первыми должны идти те, которые перехватывают
     * более частные исключения, а за ними более общие. */
    catch (MyException $e) {
        echo 'Message: ', $e->getMessage(), PHP_EOL;
        echo 'Code: ', $e->getCode(), PHP_EOL;
        echo 'File: ', $e->getFile(), PHP_EOL;
        echo 'Line: ', $e->getLine(), PHP_EOL;
        //echo 'Trace: ', $e->getTraceAsString(), PHP_EOL;
    }

    /* Внутри catch мы можем указать Type Hint для перехватываемого исключения.
     * Например MyException или Exception. Он будет аналогичен Type Hint для параметра функции. */
    catch (\Exception $e) {
        echo 'Message: ', $e->getMessage(), PHP_EOL;
        echo 'Code: ', $e->getCode(), PHP_EOL;
        echo 'File: ', $e->getFile(), PHP_EOL;
        echo 'Line: ', $e->getLine(), PHP_EOL;
        //echo 'Trace: ', $e->getTraceAsString(), PHP_EOL;
    }

    echo PHP_EOL;
    echo 'Some code lower try catch', PHP_EOL;
}

class MyException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Ooops!!! It is My Exception !!!', 777);
    }
}