<?php namespace TDD;

class Money
{
    public function equals($dollar)
    {
        return $this == $dollar;
    }

    public static function dollar($amount)
    {
        return new Dollar($amount);
    }
}

