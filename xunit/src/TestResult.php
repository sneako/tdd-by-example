<?php namespace XUnit;

class TestResult
{
    public $run_count   = 0;
    public $error_count = 0;

    public function testStarted()
    {
        $this->run_count++;
    }

    public function summary()
    {
        return "{$this->run_count} run, {$this->error_count} failed\n";
    }
    
    public function testFailed()
    {
        $this->error_count++;
    }
}

