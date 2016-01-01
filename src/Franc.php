<?php namespace TDD;

class Franc extends Money
{
    protected $amount;

    public function times($multiplier)
    {
       return new Franc($this->amount * $multiplier);
    }

    public function currency()
    {
        return "CHF";
    }
}
