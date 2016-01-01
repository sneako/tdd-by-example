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
        $five = Money::franc(5);
        $this->assertEquals($five->times(2), Money::franc(10));
        $this->assertEquals($five->times(3), Money::franc(15));
    }

    public function testEquals()
    {
        $dollar = Money::dollar(5);
        $this->assertTrue($dollar->equals(Money::dollar(5)));
        $this->assertFalse($dollar->equals(Money::dollar(6)));
        $dollar = Money::franc(5);
        $this->assertTrue($dollar->equals(Money::franc(5)));
        $this->assertFalse($dollar->equals(Money::franc(6)));
        $this->assertFalse($dollar->equals(Money::dollar(6)));
    }

    public function testCurrency()
    {
        $this->assertEquals("USD", Money::dollar(1)->currency());
        $this->assertEquals("CHF", Money::franc(1)->currency());
    }
}

