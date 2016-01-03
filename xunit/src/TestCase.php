<?php namespace XUnit;

use XUnit\TestResult;

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

    public function run($result)
    {
        $result->testStarted();
        $this->setUp();
        try {
            $this->{$this->methodName}();
        } catch (\Exception $e) {
            $result->testFailed();
        }
        $this->tearDown();
        return $result;
    }

    public function tearDown()
    {

    }
}

