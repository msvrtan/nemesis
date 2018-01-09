<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubRepo\Application;

use Devboard\GitHubRepo\Application\GitHubRepoRepository;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Devboard\GitHubRepo\Application\GitHubRepoRepository
 * @group  todo
 */
class GitHubRepoRepositoryTest extends TestCase
{
    /** @var GitHubRepoRepository */
    private $sut;

    public function setUp()
    {
        $this->sut = new GitHubRepoRepository();
    }
}
