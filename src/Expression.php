<?php namespace TDD;

interface Expression
{
    public function reduce($bank, $to);

    public function plus(Expression $addend);
}
