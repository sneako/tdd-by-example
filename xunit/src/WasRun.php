<?php namespace XUnit;

class WasRun extends TestCase
{
    public $log = "";

    public function __construct($methodName)
    {
        $this->methodName = $methodName;
    }

    public function setUp()
    {
        $this->log .= "setUp ";
    }

    public function testMethod()
    {
        $this->log .= "testMethod ";
    }
    
    public function tearDown()
    {
        $this->log .= "tearDown ";
    }
    
    public function testBrokenMethod()
    {
        throw new \Exception();
    }
}

