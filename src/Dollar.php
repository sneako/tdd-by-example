<?php namespace TDD;

class Dollar extends Money
{
    public function __construct($amount)
    {
        $this->amount = $amount;
        $this->currency = "USD";
    }

    public function times($multiplier)
    {
       return new Dollar($this->amount * $multiplier);
    }
}

