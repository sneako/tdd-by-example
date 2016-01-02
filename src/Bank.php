<?php namespace TDD;

class Bank
{
    private $rates = [];

    public function addRate($from, $to, $rate)
    {
        $this->rates[$from][$to] = $rate;
    }

    public function reduce(Expression $source, $to)
    {
        return $source->reduce($this, $to);        
    }

    public function rate($from, $to)
    {
        if ($from == $to) {
            return 1;
        }
        return $this->rates[$from][$to];
    }
}

