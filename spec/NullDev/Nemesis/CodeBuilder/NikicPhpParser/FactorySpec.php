<?php

namespace spec\NullDev\Nemesis\CodeBuilder\NikicPhpParser;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\CodeBuilder\NikicPhpParser\Factory');
    }
}
