<?php

namespace spec\NullDev\Nemesis\Target\Generator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestClassGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Target\Generator\TestClassGenerator');
    }
}
