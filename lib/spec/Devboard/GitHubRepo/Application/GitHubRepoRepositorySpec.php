<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Application;

use Broadway\EventSourcing\EventSourcingRepository;
use Devboard\GitHubRepo\Application\GitHubRepoRepository;
use PhpSpec\ObjectBehavior;

class GitHubRepoRepositorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoRepository::class);
        $this->shouldHaveType(EventSourcingRepository::class);
    }
}
