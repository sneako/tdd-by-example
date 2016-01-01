<?php namespace TDD;

class Dollar extends Money
{
    protected $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function times($multiplier)
    {
       return new Dollar($this->amount * $multiplier);
    }
}

