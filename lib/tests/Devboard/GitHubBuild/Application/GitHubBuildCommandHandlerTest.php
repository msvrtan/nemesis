<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubBuild\Application;

use Devboard\GitHubBuild\Application\GitHubBuildCommandHandler;
use Devboard\GitHubBuild\Application\GitHubBuildRepository;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Devboard\GitHubBuild\Application\GitHubBuildCommandHandler
 * @group  todo
 */
class GitHubBuildCommandHandlerTest extends TestCase
{
    /** @var GitHubBuildRepository */
    private $repository;

    /** @var GitHubBuildCommandHandler */
    private $sut;

    public function setUp()
    {
        $this->repository = new GitHubBuildRepository(
            \Mockery::mock('Broadway\EventStore\EventStore'),
            \Mockery::mock('Broadway\EventHandling\EventBus'),
            ['data']
        );
        $this->sut = new GitHubBuildCommandHandler($this->repository);
    }
}
