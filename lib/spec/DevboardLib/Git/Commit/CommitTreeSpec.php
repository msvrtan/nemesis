<?php

declare(strict_types=1);

namespace spec\DevboardLib\Git\Commit;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\Git\Commit\CommitTree;
use Git\Commit\CommitTree as CommitTreeInterface;
use PhpSpec\ObjectBehavior;

class CommitTreeSpec extends ObjectBehavior
{
    public function let(CommitSha $sha)
    {
        $this->beConstructedWith($sha);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitTree::class);
        $this->shouldImplement(CommitTreeInterface::class);
    }

    public function it_exposes_sha(CommitSha $sha)
    {
        $this->getSha()->shouldReturn($sha);
    }

    public function it_can_be_serialized(CommitSha $sha)
    {
        $sha->serialize()->shouldBeCalled()->willReturn('02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0');
        $this->serialize()->shouldReturn('02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0');
    }

    public function it_can_be_deserialized()
    {
        $input = '02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0';

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitTree::class);
    }
}
