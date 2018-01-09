<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubBuild\Core;

use Devboard\GitHubBuild\Core\GitHubBuildRootId;
use PhpSpec\ObjectBehavior;

class GitHubBuildRootIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($encodedValue = 'R0hCdWlsZFJvb3Q6MTIz');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBuildRootId::class);
    }

    public function it_exposes_encoded_value()
    {
        $this->getEncodedValue()->shouldReturn('R0hCdWlsZFJvb3Q6MTIz');
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn('R0hCdWlsZFJvb3Q6MTIz');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('R0hCdWlsZFJvb3Q6MTIz');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('R0hCdWlsZFJvb3Q6MTIz');
    }

    public function it_can_be_deserialized()
    {
        $input = 'R0hCdWlsZFJvb3Q6MTIz';

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubBuildRootId::class);
    }
}
