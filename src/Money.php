<?php namespace TDD;

class Money
{
    public function equals($dollar)
    {
        return $this->amount == $dollar->amount;
    }
}
