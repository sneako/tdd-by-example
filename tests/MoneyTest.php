<?php
use TDD\Money;
use TDD\Dollar;
use TDD\Franc;

class MoneyTest extends PHPUnit_Framework_TestCase
{
    public function testMultiplication()
    {
        $five = Money::dollar(5);
        $this->assertTrue($five->times(2)->equals(Money::dollar(10)));
        $this->assertTrue($five->times(3)->equals(Money::dollar(15)));
        $five = Money::franc(5);
        $this->assertTrue($five->times(2)->equals(Money::franc(10)));
        $this->assertTrue($five->times(3)->equals(Money::franc(15)));
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

    public function testDifferentClassEquality()
    {
        $five = new Money(5, "CHF");
        $this->assertTrue($five->equals(new Franc(5, "CHF")));
    }
}

