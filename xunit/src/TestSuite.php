<?php namespace XUnit;

class TestSuite
{
    public $tests = [];

    public function add($test)
    {
        $this->tests[] = $test;
    }

    public function run(TestResult $result)
    {
        foreach ($this->tests as $test) {
            $test->run($result);
        }
    }
}

