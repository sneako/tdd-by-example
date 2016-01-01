<?php 
use TDD\Money;
use TDD\Dollar;
use TDD\Franc;
use TDD\Bank;
use TDD\Sum;

class MeneyTest extends PHPUnit_Framework_TestCase
{
    public function testMultiplication()
    {
        $five = Money::dollar(5);
        $this->assertTrue($five->times(2)->equals(Money::dollar(10)));
        $this->assertTrue($five->times(3)->equals(Money::dollar(15)));
    }

    public function testEquals()
    {
        $five_dollars = Money::dollar(5);
        $this->assertTrue($five_dollars->equals(Money::dollar(5)));
        $this->assertFalse($five_dollars->equals(Money::franc(6)));
        $this->assertFalse($five_dollars->equals(Money::dollar(6)));
    }

    public function testCurrency()
    {
        $this->assertEquals("USD", Money::dollar(1)->currency());
        $this->assertEquals("CHF", Money::franc(1)->currency());
    }

    public function testSimpleAddition()
    {
        $five = Money::dollar(5);
        $sum  = $five->plus($five);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(10), $reduced);
    }

    public function testPlusReturnsSum()
    {
        $five = Money::dollar(5);
        $result = $five->plus($five);
        $this->assertEquals($five, $result->augend);
        $this->assertEquals($five, $result->addend);
    }   

    public function testReduceSum()
    {
        $sum = new Sum(Money::dollar(3), Money::dollar(4));
        $bank = new Bank();
        $result = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(7), $result);
    }
}

