<?php namespace TDD;

interface Expression
{
    public function reduce($bank, $to);
}
