<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubBuild\Application;

use Broadway\CommandHandling\SimpleCommandHandler;
use Devboard\GitHubBuild\Application\GitHubBuildCommandHandler;
use Devboard\GitHubBuild\Application\GitHubBuildRepository;
use PhpSpec\ObjectBehavior;

class GitHubBuildCommandHandlerSpec extends ObjectBehavior
{
    public function let(GitHubBuildRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBuildCommandHandler::class);
        $this->shouldHaveType(SimpleCommandHandler::class);
    }
}
