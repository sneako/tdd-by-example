<?php 
use TDD\Money;
use TDD\Dollar;
use TDD\Franc;
use TDD\Bank;
use TDD\Sum;

class MoneyTest extends PHPUnit_Framework_TestCase
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

    public function testReduceMoney()
    {
        $bank = new Bank();
        $result = $bank->reduce(Money::dollar(1), "USD");
        $this->assertEquals(Money::dollar(1), $result);
    }

    public function testReduceMoneyDifferentCurrencies()
    {
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $result = $bank->reduce(Money::franc(2), "USD");
        $this->assertEquals(Money::dollar(1), $result);
    }

    public function testIdentityRate()
    {
        $bank = new Bank();
        $this->assertEquals(1, $bank->rate("USD", "USD"));
    } 

    public function testMixedAddition() 
    {
        $five_dollars = Money::dollar(5);
        $ten_francs   = Money::franc(10);
        $bank         = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $result = $bank->reduce($five_dollars->plus($ten_francs), "USD");
        $this->assertEquals(Money::dollar(10), $result);
    }

    public function testSumPlusMoney()
    {
        $five_bucks = Money::dollar(5);
        $ten_francs = Money::franc(10);
        $bank       = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $sum = new Sum($five_bucks, $ten_francs);
        $sum->plus($five_bucks);
        $result = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(10), $result);
    }

    public function testSumTimes()
    {
        $five_bucks = Money::dollar(5);
        $ten_francs = Money::franc(10);
        $bank       = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $sum = new Sum($five_bucks, $ten_francs);
        $final = $sum->times(2);
        $result = $bank->reduce($final, "USD");
        $this->assertEquals(Money::dollar(20), $result);
    }
}

