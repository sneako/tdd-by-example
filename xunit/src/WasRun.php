<?php namespace XUnit;

class WasRun extends TestCase
{
    public $wasRun = null;

    public function __construct($methodName)
    {
        $this->methodName = $methodName;
    }

    public function testMethod()
    {
        $this->wasRun = 1;
    }

}

