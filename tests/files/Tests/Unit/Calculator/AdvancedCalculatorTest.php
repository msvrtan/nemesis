<?php

namespace Tests\Unit\Calculator;

use Calculator\AdvancedCalculator;
use Mockery as m;

class AdvancedCalculatorTest extends \PHPUnit_Framework_TestCase
{
    protected $target;
    public function setUp()
    {
        $mockEngine = m::mock('stdClass');
        $this->target = new AdvancedCalculator($mockEngine);
    }
    public function testDoSomething()
    {
        $result = $this->target->doSomething();
        $this->assertNotNull($result);
    }
}
