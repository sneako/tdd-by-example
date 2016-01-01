<?php namespace TDD;

class Franc extends Money
{
    public function times($multiplier)
    {
       return Money::franc($this->amount * $multiplier);
    }
}

