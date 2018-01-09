<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubBuild\Domain\Event;

use DateTime;
use Devboard\GitHubBuild\Core\GitHubBuildRootId;
use Devboard\GitHubBuild\Domain\Event\GitHubBuildInitialized;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Devboard\GitHubBuild\Domain\Event\GitHubBuildInitialized
 * @group  todo
 */
class GitHubBuildInitializedTest extends TestCase
{
    /** @var GitHubBuildRootId */
    private $buildRootId;

    /** @var DateTime */
    private $initializedAt;

    /** @var GitHubBuildInitialized */
    private $sut;

    public function setUp()
    {
        $this->buildRootId   = new GitHubBuildRootId('R0hCdWlsZFJvb3Q6MTIz');
        $this->initializedAt = new DateTime('2018-01-01T00:01:00+00:00');
        $this->sut           = new GitHubBuildInitialized($this->buildRootId, $this->initializedAt);
    }

    public function testCreate()
    {
        $buildRootId = new GitHubBuildRootId('R0hCdWlsZFJvb3Q6MTIz');
        $result      = $this->sut->create($buildRootId);
        self::assertInstanceOf(GitHubBuildInitialized::class, $result);
    }

    public function testGetBuildRootId()
    {
        self::assertSame($this->buildRootId, $this->sut->getBuildRootId());
    }

    public function testGetInitializedAt()
    {
        self::assertSame($this->initializedAt, $this->sut->getInitializedAt());
    }

    public function testSerialize()
    {
        $expected = [
            'buildRootId'   => 'R0hCdWlsZFJvb3Q6MTIz',
            'initializedAt' => '2018-01-01T00:01:00+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubBuildInitialized::deserialize(json_decode($serialized, true)));
    }
}
