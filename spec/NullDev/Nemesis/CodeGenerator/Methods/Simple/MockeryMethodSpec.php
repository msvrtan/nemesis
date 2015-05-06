<?php

namespace spec\NullDev\Nemesis\CodeGenerator\Methods\Simple;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MockeryMethodSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\CodeGenerator\Methods\Simple\MockeryMethod');
    }

    /**
     * @param ReflectionMethod $method
     */
    public function let($method)
    {
        $this->beConstructedWith($method);
    }
}
