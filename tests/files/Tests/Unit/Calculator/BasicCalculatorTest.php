<?php

namespace Tests\Unit\Calculator;

use Calculator\BasicCalculator;
use Mockery as m;

class BasicCalculatorTest extends \PHPUnit_Framework_TestCase
{
    protected $target;
    public function setUp()
    {
        $this->target = new BasicCalculator();
    }
    public function testGetVarA()
    {
        $result = $this->target->getVarA();
        $this->assertNotNull($result);
    }
    public function testSetVarA()
    {
        $mockVarA = m::mock();
        $result = $this->target->setVarA($mockVarA);
        $this->assertNotNull($result);
    }
}
