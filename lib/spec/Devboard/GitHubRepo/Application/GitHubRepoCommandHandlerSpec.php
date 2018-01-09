<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Application;

use Broadway\CommandHandling\SimpleCommandHandler;
use Devboard\GitHubRepo\Application\GitHubRepoCommandHandler;
use Devboard\GitHubRepo\Application\GitHubRepoRepository;
use PhpSpec\ObjectBehavior;

class GitHubRepoCommandHandlerSpec extends ObjectBehavior
{
    public function let(GitHubRepoRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoCommandHandler::class);
        $this->shouldHaveType(SimpleCommandHandler::class);
    }
}
