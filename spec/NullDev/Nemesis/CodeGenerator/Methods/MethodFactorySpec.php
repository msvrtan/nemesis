<?php

namespace spec\NullDev\Nemesis\CodeGenerator\Methods;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MethodFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\CodeGenerator\Methods\MethodFactory');
    }
}
