<?php
/*
 * Паттерн Стратегия определяет семейство алгоритмов, инкапсулирует
 * каждый из них и обеспечивает их взаимозаменяемость. Он позволяет
 * модифицировать алгоритмы независимо от их использования на стороне
 * клиента.
 */


interface Strategy
{
    function sing();
}

class human implements Strategy
{
    function sing() {
        echo 'Ля ля ля';
    }
}


class bird implements Strategy
{
    function sing() {
        echo 'Чик Чик Чик';
    }
}

class Context
{
    private $animal;
    function __construct(Strategy $animal)
    {
        $this->animal = $animal;
    }

    public function run() {
        $this->animal->sing();
    }
}

$a1 = new Context(new human());
$a1->run();

$a2 = new Context(new bird());
$a2->run();