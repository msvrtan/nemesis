<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubBuild\Domain\Event;

use Broadway\Serializer\Serializable;
use DateTime;
use Devboard\GitHubBuild\Core\GitHubBuildRootId;
use Devboard\GitHubBuild\Domain\Event\GitHubBuildInitialized;
use PhpSpec\ObjectBehavior;

class GitHubBuildInitializedSpec extends ObjectBehavior
{
    public function let(GitHubBuildRootId $buildRootId, DateTime $initializedAt)
    {
        $this->beConstructedWith($buildRootId, $initializedAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBuildInitialized::class);
        $this->shouldImplement(Serializable::class);
    }

    public function it_has_a_helper_factory_method(GitHubBuildRootId $buildRootId)
    {
        $this->create($buildRootId)->shouldReturnAnInstanceOf(GitHubBuildInitialized::class);
    }

    public function it_exposes_build_root_id(GitHubBuildRootId $buildRootId)
    {
        $this->getBuildRootId()->shouldReturn($buildRootId);
    }

    public function it_exposes_initialized_at(DateTime $initializedAt)
    {
        $this->getInitializedAt()->shouldReturn($initializedAt);
    }

    public function it_can_be_serialized(GitHubBuildRootId $buildRootId, DateTime $initializedAt)
    {
        $buildRootId->serialize()->shouldBeCalled()->willReturn('R0hCdWlsZFJvb3Q6MTIz');
        $initializedAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn(
            ['buildRootId' => 'R0hCdWlsZFJvb3Q6MTIz', 'initializedAt' => '2018-01-01T00:01:00+00:00']
        );
    }

    public function it_can_be_deserialized()
    {
        $input = ['buildRootId' => 'R0hCdWlsZFJvb3Q6MTIz', 'initializedAt' => '2018-01-01T00:01:00+00:00'];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubBuildInitialized::class);
    }
}
