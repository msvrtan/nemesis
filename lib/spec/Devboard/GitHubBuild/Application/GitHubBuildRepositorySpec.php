<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubBuild\Application;

use Broadway\EventSourcing\EventSourcingRepository;
use Devboard\GitHubBuild\Application\GitHubBuildRepository;
use PhpSpec\ObjectBehavior;

class GitHubBuildRepositorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBuildRepository::class);
        $this->shouldHaveType(EventSourcingRepository::class);
    }
}
