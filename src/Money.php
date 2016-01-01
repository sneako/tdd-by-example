<?php namespace TDD;

abstract class Money
{
    public function __construct($amount)
    {
        $this->amount = $amount;
    }
    
    public abstract function currency();

    public function equals($dollar)
    {
        return $this == $dollar;
    }

    public static function dollar($amount)
    {
        return new Dollar($amount);
    }

    public static function franc($amount)
    {
        return new Franc($amount);
    }

}

