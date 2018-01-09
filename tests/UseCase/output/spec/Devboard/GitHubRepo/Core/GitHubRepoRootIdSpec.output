<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Core;

use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use PhpSpec\ObjectBehavior;

class GitHubRepoRootIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($encodedValue = 'R0hSZXBvUm9vdDoxMjM=');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoRootId::class);
    }

    public function it_exposes_encoded_value()
    {
        $this->getEncodedValue()->shouldReturn('R0hSZXBvUm9vdDoxMjM=');
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn('R0hSZXBvUm9vdDoxMjM=');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('R0hSZXBvUm9vdDoxMjM=');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('R0hSZXBvUm9vdDoxMjM=');
    }

    public function it_can_be_deserialized()
    {
        $input = 'R0hSZXBvUm9vdDoxMjM=';

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubRepoRootId::class);
    }
}
