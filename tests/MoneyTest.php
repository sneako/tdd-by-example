<?php
use TDD\Money;
use TDD\Dollar;
use TDD\Franc;

class MoneyTest extends PHPUnit_Framework_TestCase
{
    public function testMultiplication()
    {
        $five = Money::dollar(5);
        $this->assertEquals($five->times(2), Money::dollar(10));
        $this->assertEquals($five->times(3), Money::dollar(15));
        $five = new Franc(5);
        $this->assertEquals($five->times(2), new Franc(10));
        $this->assertEquals($five->times(3), new Franc(15));
    }

    public function testEquals()
    {
        $dollar = Money::dollar(5);
        $this->assertTrue($dollar->equals(Money::dollar(5)));
        $this->assertFalse($dollar->equals(Money::dollar(6)));
        $dollar = new Franc(5);
        $this->assertTrue($dollar->equals(new Franc(5)));
        $this->assertFalse($dollar->equals(new Franc(6)));
        $this->assertFalse($dollar->equals(Money::dollar(6)));
    }
}

