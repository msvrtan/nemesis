<?php

declare(strict_types=1);

namespace spec\DevboardLib\Git\Commit\Committer;

use DevboardLib\Git\Commit\Committer\CommitterName;
use Git\Commit\Committer\CommitterName as CommitterNameInterface;
use PhpSpec\ObjectBehavior;

class CommitterNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($name = 'John Smith');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitterName::class);
        $this->shouldImplement(CommitterNameInterface::class);
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('John Smith');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('John Smith');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('John Smith');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('John Smith');
    }

    public function it_can_be_deserialized()
    {
        $input = 'John Smith';

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitterName::class);
    }
}
