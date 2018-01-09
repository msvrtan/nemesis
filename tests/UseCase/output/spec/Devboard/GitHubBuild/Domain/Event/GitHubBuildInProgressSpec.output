<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubBuild\Domain\Event;

use Broadway\Serializer\Serializable;
use DateTime;
use Devboard\GitHubBuild\Core\GitHubBuildId;
use Devboard\GitHubBuild\Domain\Event\GitHubBuildEvent;
use Devboard\GitHubBuild\Domain\Event\GitHubBuildInProgress;
use PhpSpec\ObjectBehavior;

class GitHubBuildInProgressSpec extends ObjectBehavior
{
    public function let(GitHubBuildId $buildId, DateTime $createdAt)
    {
        $this->beConstructedWith($buildId, $createdAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBuildInProgress::class);
        $this->shouldImplement(GitHubBuildEvent::class);
        $this->shouldImplement(Serializable::class);
    }

    public function it_has_a_helper_factory_method(GitHubBuildId $buildId)
    {
        $this->create($buildId)->shouldReturnAnInstanceOf(GitHubBuildInProgress::class);
    }

    public function it_exposes_build_id(GitHubBuildId $buildId)
    {
        $this->getBuildId()->shouldReturn($buildId);
    }

    public function it_exposes_created_at(DateTime $createdAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
    }

    public function it_can_be_serialized(GitHubBuildId $buildId, DateTime $createdAt)
    {
        $buildId->serialize()->shouldBeCalled()->willReturn('R0hCdWlsZDoxMjM6MQ==');
        $createdAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn(
            ['buildId' => 'R0hCdWlsZDoxMjM6MQ==', 'createdAt' => '2018-01-01T00:01:00+00:00']
        );
    }

    public function it_can_be_deserialized()
    {
        $input = ['buildId' => 'R0hCdWlsZDoxMjM6MQ==', 'createdAt' => '2018-01-01T00:01:00+00:00'];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubBuildInProgress::class);
    }
}
