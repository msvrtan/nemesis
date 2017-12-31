<?php

declare(strict_types=1);

namespace spec\DevboardLib\Git\Commit;

use DevboardLib\Git\Commit\CommitSha;
use Git\Commit\CommitSha as CommitShaInterface;
use PhpSpec\ObjectBehavior;

class CommitShaSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($sha = 'e54c3c97b4024b4a9b270b62921c6b830d780bd3');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitSha::class);
        $this->shouldImplement(CommitShaInterface::class);
    }

    public function it_exposes_sha()
    {
        $this->getSha()->shouldReturn('e54c3c97b4024b4a9b270b62921c6b830d780bd3');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('e54c3c97b4024b4a9b270b62921c6b830d780bd3');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('e54c3c97b4024b4a9b270b62921c6b830d780bd3');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('e54c3c97b4024b4a9b270b62921c6b830d780bd3');
    }

    public function it_can_be_deserialized()
    {
        $input = 'e54c3c97b4024b4a9b270b62921c6b830d780bd3';

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitSha::class);
    }
}
