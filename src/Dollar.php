<?php namespace TDD;

class Dollar extends Money
{
    protected $amount;

    public function times($multiplier)
    {
       return new Dollar($this->amount * $multiplier);
    }

    public function currency()
    {
        return "USD";
    }
}

