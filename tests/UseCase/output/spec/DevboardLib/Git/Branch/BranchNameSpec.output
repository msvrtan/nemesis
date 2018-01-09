<?php

declare(strict_types=1);

namespace spec\DevboardLib\Git\Branch;

use DevboardLib\Git\Branch\BranchName;
use Git\Reference\ReferenceName;
use PhpSpec\ObjectBehavior;

class BranchNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($name = 'master');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BranchName::class);
        $this->shouldImplement(ReferenceName::class);
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('master');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('master');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('master');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('master');
    }

    public function it_can_be_deserialized()
    {
        $input = 'master';

        $this->deserialize($input)->shouldReturnAnInstanceOf(BranchName::class);
    }
}
