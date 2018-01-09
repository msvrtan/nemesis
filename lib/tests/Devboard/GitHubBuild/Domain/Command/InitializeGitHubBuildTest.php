<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubBuild\Domain\Command;

use Devboard\GitHubBuild\Core\GitHubBuildRootId;
use Devboard\GitHubBuild\Domain\Command\InitializeGitHubBuild;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Devboard\GitHubBuild\Domain\Command\InitializeGitHubBuild
 * @group  todo
 */
class InitializeGitHubBuildTest extends TestCase
{
    /** @var GitHubBuildRootId */
    private $gitHubBuildRootId;

    /** @var InitializeGitHubBuild */
    private $sut;

    public function setUp()
    {
        $this->gitHubBuildRootId = new GitHubBuildRootId('R0hCdWlsZFJvb3Q6MTIz');
        $this->sut               = new InitializeGitHubBuild($this->gitHubBuildRootId);
    }

    public function testGetGitHubBuildRootId()
    {
        self::assertSame($this->gitHubBuildRootId, $this->sut->getGitHubBuildRootId());
    }

    public function testSerialize()
    {
        self::assertEquals($this->gitHubBuildRootId->serialize(), $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, InitializeGitHubBuild::deserialize(json_decode($serialized, true)));
    }
}
