<?php namespace TDD;

class Franc extends Money
{
    protected $amount;
    protected $currency;
    
    public function __construct($amount)
    {
        $this->amount = $amount;
        $this->currency = "CHF";
    }

    public function times($multiplier)
    {
       return new Franc($this->amount * $multiplier);
    }
}

