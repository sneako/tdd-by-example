<?php namespace XUnit;

class TestCase
{
    public $methodName;

    public function __construct($methodName)
    {
        $this->methodName = $methodName;
    }

    public function setUp()
    {
    }

    public function run()
    {
        $this->setUp();
        $this->{$this->methodName}();
        $this->tearDown();
    }

    public function tearDown()
    {

    }
}

