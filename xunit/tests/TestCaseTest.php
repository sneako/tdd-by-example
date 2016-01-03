<?php
require "../vendor/autoload.php";

use XUnit\TestCase;
use XUnit\WasRun;

class TestCaseTest extends TestCase
{
    public $test;

    public function testTemplateMethod()
    {
        $this->test = new WasRun("testMethod");
        $this->test->run();
        assert($this->test->log === "setUp testMethod tearDown ");
    }
}

$test = new TestCaseTest("testTemplateMethod");
$test->run();

