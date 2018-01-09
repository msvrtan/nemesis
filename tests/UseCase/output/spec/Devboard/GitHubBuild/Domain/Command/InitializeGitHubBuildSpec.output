<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubBuild\Domain\Command;

use Devboard\GitHubBuild\Core\GitHubBuildRootId;
use Devboard\GitHubBuild\Domain\Command\InitializeGitHubBuild;
use PhpSpec\ObjectBehavior;

class InitializeGitHubBuildSpec extends ObjectBehavior
{
    public function let(GitHubBuildRootId $gitHubBuildRootId)
    {
        $this->beConstructedWith($gitHubBuildRootId);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InitializeGitHubBuild::class);
    }

    public function it_exposes_git_hub_build_root_id(GitHubBuildRootId $gitHubBuildRootId)
    {
        $this->getGitHubBuildRootId()->shouldReturn($gitHubBuildRootId);
    }

    public function it_can_be_serialized(GitHubBuildRootId $gitHubBuildRootId)
    {
        $gitHubBuildRootId->serialize()->shouldBeCalled()->willReturn('R0hCdWlsZFJvb3Q6MTIz');
        $this->serialize()->shouldReturn('R0hCdWlsZFJvb3Q6MTIz');
    }

    public function it_can_be_deserialized()
    {
        $input = 'R0hCdWlsZFJvb3Q6MTIz';

        $this->deserialize($input)->shouldReturnAnInstanceOf(InitializeGitHubBuild::class);
    }
}
