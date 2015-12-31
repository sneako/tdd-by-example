<?php
use TDD\Dollar;

class DollarTest extends PHPUnit_Framework_TestCase
{
    public function testMultiplication()
    {
        $five = new Dollar(5);
        $this->assertEquals($five->times(2), new Dollar(10));
        $this->assertEquals($five->times(3), new Dollar(15));
    }

    public function testEquals()
    {
        $dollar = new Dollar(5);
        $this->assertTrue($dollar->equals(new Dollar(5)));
        $this->assertFalse($dollar->equals(new Dollar(6)));
    }
}

