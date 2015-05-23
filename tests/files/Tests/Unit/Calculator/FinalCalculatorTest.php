<?php

namespace Tests\Unit\Calculator;

use Calculator\FinalCalculator;
use Mockery as m;

class FinalCalculatorTest extends \PHPUnit_Framework_TestCase
{
    protected $target;
    public function setUp()
    {
        $this->target = new FinalCalculator();
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
    public function testGetVarB()
    {
        $result = $this->target->getVarB();
        $this->assertNotNull($result);
    }
    public function testSetVarB()
    {
        $mockVarB = m::mock('DateTime');
        $result = $this->target->setVarB($mockVarB);
        $this->assertNotNull($result);
    }
    public function testGetVarC()
    {
        $result = $this->target->getVarC();
        $this->assertNotNull($result);
    }
    public function testSetVarC()
    {
        $mockVarC = m::mock();
        $result = $this->target->setVarC($mockVarC);
        $this->assertNotNull($result);
    }
}
