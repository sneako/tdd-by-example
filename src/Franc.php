<?php namespace TDD;

class Franc extends Money
{
    protected $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function times($multiplier)
    {
       return new Franc($this->amount * $multiplier);
    }
}
