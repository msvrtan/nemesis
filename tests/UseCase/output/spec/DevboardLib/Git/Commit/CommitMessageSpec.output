<?php

declare(strict_types=1);

namespace spec\DevboardLib\Git\Commit;

use DevboardLib\Git\Commit\CommitMessage;
use Git\Commit\CommitMessage as CommitMessageInterface;
use PhpSpec\ObjectBehavior;

class CommitMessageSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($message = 'A commit message');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitMessage::class);
        $this->shouldImplement(CommitMessageInterface::class);
    }

    public function it_exposes_message()
    {
        $this->getMessage()->shouldReturn('A commit message');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('A commit message');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('A commit message');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('A commit message');
    }

    public function it_can_be_deserialized()
    {
        $input = 'A commit message';

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitMessage::class);
    }
}
