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

    public function reduce($bank, $to)
    {
        $amount = $this->augend->reduce($bank, $to)->amount 
            + $this->addend->reduce($bank, $to)->amount;
        return new Money($amount, $to);
    }

    public function plus(Expression $addend)
    {
        return new Sum($this, $addend);
    }

    public function times($multiplier)
    {
        return new Sum($this->augend->times($multiplier), $this->addend->times($multiplier));
    }
}

