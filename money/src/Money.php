<?php namespace TDD;

class Money implements Expression
{
    public $amount;
    protected $currency;

    public function __construct($amount, $currency)
    {
        $this->amount   = $amount;
        $this->currency = $currency;
    }

    public function currency()
    {
        return $this->currency;
    }

    public function equals(Money $money)
    {
        return $this->amount == $money->amount && $this->currency() == $money->currency;
    }

    public function times($multiplier)
    {
       return new Money($this->amount * $multiplier, $this->currency);
    }
    
    public function plus(Expression $addend)
    {
        return new Sum($this, $addend);
    }

    public static function dollar($amount)
    {
        return new Money($amount, "USD");
    }

    public static function franc($amount)
    {
        return new Money($amount, "CHF");
    }

    public function reduce($bank, $to)
    {
        $rate = $bank->rate($this->currency, $to);
        return new Money($this->amount / $rate, $to);
    }
}

