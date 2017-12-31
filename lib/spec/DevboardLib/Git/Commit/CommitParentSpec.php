<?php

declare(strict_types=1);

namespace spec\DevboardLib\Git\Commit;

use DevboardLib\Git\Commit\CommitParent;
use DevboardLib\Git\Commit\CommitSha;
use Git\Commit\CommitParent as CommitParentInterface;
use PhpSpec\ObjectBehavior;

class CommitParentSpec extends ObjectBehavior
{
    public function let(CommitSha $sha)
    {
        $this->beConstructedWith($sha);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitParent::class);
        $this->shouldImplement(CommitParentInterface::class);
    }

    public function it_exposes_sha(CommitSha $sha)
    {
        $this->getSha()->shouldReturn($sha);
    }

    public function it_can_be_serialized(CommitSha $sha)
    {
        $sha->serialize()->shouldBeCalled()->willReturn('5246f51f550db504e76c98b641e3337570e84dd4');
        $this->serialize()->shouldReturn('5246f51f550db504e76c98b641e3337570e84dd4');
    }

    public function it_can_be_deserialized()
    {
        $input = '5246f51f550db504e76c98b641e3337570e84dd4';

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitParent::class);
    }
}
