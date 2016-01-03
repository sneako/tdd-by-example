<?php

require "vendor/autoload.php";

use XUnit\TestCase;
use XUnit\WasRun;

class TestCaseTest extends TestCase
{
    public function testRunning()
    {
        $test = new WasRun("testMethod");
        assert(!$test->wasRun);
        $test->run();
        assert($test->wasRun);
    }
}

$test = new TestCaseTest("testRunning");
$test->run();

