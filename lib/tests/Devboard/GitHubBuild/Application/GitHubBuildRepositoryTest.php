<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubBuild\Application;

use Devboard\GitHubBuild\Application\GitHubBuildRepository;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Devboard\GitHubBuild\Application\GitHubBuildRepository
 * @group  todo
 */
class GitHubBuildRepositoryTest extends TestCase
{
    /** @var GitHubBuildRepository */
    private $sut;

    public function setUp()
    {
        $this->sut = new GitHubBuildRepository();
    }
}
