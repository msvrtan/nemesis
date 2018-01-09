<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubBuild\Core;

use Devboard\GitHubBuild\Core\GitHubBuildId;
use PhpSpec\ObjectBehavior;

class GitHubBuildIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($encodedValue = 'R0hCdWlsZDoxMjM6MQ==');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBuildId::class);
    }

    public function it_exposes_encoded_value()
    {
        $this->getEncodedValue()->shouldReturn('R0hCdWlsZDoxMjM6MQ==');
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn('R0hCdWlsZDoxMjM6MQ==');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('R0hCdWlsZDoxMjM6MQ==');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('R0hCdWlsZDoxMjM6MQ==');
    }

    public function it_can_be_deserialized()
    {
        $input = 'R0hCdWlsZDoxMjM6MQ==';

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubBuildId::class);
    }
}
