<?php

namespace spec\NullDev\Nemesis\CodeGenerator\Methods\Autonomous;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MockeryMethodSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\CodeGenerator\Methods\Autonomous\MockeryMethod');
    }

    /**
     * @param ReflectionClass $class
     * @param ReflectionMethod $method
     */
    public function let($class,$method)
    {
        $this->beConstructedWith($class,$method);
    }
}
