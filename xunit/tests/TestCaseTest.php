<?php
require "../vendor/autoload.php";

use XUnit\TestCase;
use XUnit\WasRun;
use XUnit\TestResult;
use XUnit\TestSuite;

class TestCaseTest extends TestCase
{
    public $result;

    public function setUp()
    {
        $this->result = new TestResult();
    }

    public function testTemplateMethod()
    {
        $test = new WasRun("testMethod");
        $test->run($this->result);
        assert($test->log === "setUp testMethod tearDown ");
    }
    
    public function testResult()
    {
        $test = new WasRun("testMethod");
        $test->run($this->result);
        assert("1 run, 0 failed\n" == $this->result->summary());
    }

    public function testFailedResult()
    {
        $test = new WasRun("testBrokenMethod");
        $result = $test->run($this->result);
        assert("1 run, 1 failed\n" == $this->result->summary());
    }

    public function testFailedResultFormatting()
    {
        $this->result->testStarted();
        $this->result->testFailed();
        assert("1 run, 1 failed\n" == $this->result->summary());
    }

    public function testSuite()
    {
        $suite = new TestSuite();
        $suite->add(new WasRun("testMethod"));
        $suite->add(new WasRun("testBrokenMethod"));
        $suite->run($this->result);
        assert("2 run, 1 failed\n" == $this->result->summary());
    }
}

$suite = new TestSuite();
$suite->add(new TestCaseTest("testTemplateMethod"));
$suite->add(new TestCaseTest("testResult"));
$suite->add(new TestCaseTest("testFailedResult"));
$suite->add(new TestCaseTest("testSuite"));
$result = new TestResult();
$suite->run($result);
echo $result->summary();


