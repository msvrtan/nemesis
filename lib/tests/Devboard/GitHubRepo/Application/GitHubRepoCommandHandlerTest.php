<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubRepo\Application;

use Devboard\GitHubRepo\Application\GitHubRepoCommandHandler;
use Devboard\GitHubRepo\Application\GitHubRepoRepository;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Devboard\GitHubRepo\Application\GitHubRepoCommandHandler
 * @group  todo
 */
class GitHubRepoCommandHandlerTest extends TestCase
{
    /** @var GitHubRepoRepository */
    private $repository;

    /** @var GitHubRepoCommandHandler */
    private $sut;

    public function setUp()
    {
        $this->repository = new GitHubRepoRepository(
            \Mockery::mock('Broadway\EventStore\EventStore'),
            \Mockery::mock('Broadway\EventHandling\EventBus'),
            ['data']
        );
        $this->sut = new GitHubRepoCommandHandler($this->repository);
    }
}
