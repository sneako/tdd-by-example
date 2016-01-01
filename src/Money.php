<?php namespace TDD;

abstract class Money
{
    protected $amount;
    protected $currency;

    public function currency()
    {
        return $this->currency;
    }

    public function equals($money)
    {
        return $this == $money;
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

