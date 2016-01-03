<?php namespace XUnit;

class TestCase
{
    public $methodName;

    public function __construct($methodName)
    {
        $this->methodName = $methodName;
    }

    public function run()
    {
        $this->{$this->methodName}();
    }
}

