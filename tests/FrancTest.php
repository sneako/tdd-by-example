<?php
use TDD\Franc;

class FrancTest extends PHPUnit_Framework_TestCase
{
    public function testMultiplication()
    {
        $five = new Franc(5);
        $this->assertEquals($five->times(2), new Franc(10));
        $this->assertEquals($five->times(3), new Franc(15));
    }

}
