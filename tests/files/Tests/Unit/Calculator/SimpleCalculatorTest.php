<?php

namespace Tests\Unit\Calculator;

use Calculator\SimpleCalculator;
use Mockery as m;

class SimpleCalculatorTest extends \PHPUnit_Framework_TestCase
{
    protected $target;
    public function setUp()
    {
        $mockArg1 = m::mock();
        $mockArg2 = m::mock();
        $mockArg3 = m::mock();
        $this->target = new SimpleCalculator($mockArg1, $mockArg2, $mockArg3);
    }
    public function testGetArg1()
    {
        $result = $this->target->getArg1();
        $this->assertNotNull($result);
    }
    public function testGetArg2()
    {
        $result = $this->target->getArg2();
        $this->assertNotNull($result);
    }
    public function testGetArg3()
    {
        $result = $this->target->getArg3();
        $this->assertNotNull($result);
    }
}
