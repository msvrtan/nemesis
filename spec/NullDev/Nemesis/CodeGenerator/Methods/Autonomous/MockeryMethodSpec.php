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
}
