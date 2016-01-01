<?php namespace TDD;

class Sum implements Expression
{
    public $augend;
    public $addend;

    public function __construct($augend, $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function reduce($to)
    {
        $amount = $this->augend->amount + $this->addend->amount;
        return new Money($amount, $to);
    }
}

