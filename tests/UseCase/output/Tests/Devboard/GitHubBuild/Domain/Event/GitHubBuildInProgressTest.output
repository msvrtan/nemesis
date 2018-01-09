<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubBuild\Domain\Event;

use DateTime;
use Devboard\GitHubBuild\Core\GitHubBuildId;
use Devboard\GitHubBuild\Domain\Event\GitHubBuildInProgress;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Devboard\GitHubBuild\Domain\Event\GitHubBuildInProgress
 * @group  todo
 */
class GitHubBuildInProgressTest extends TestCase
{
    /** @var GitHubBuildId */
    private $buildId;

    /** @var DateTime */
    private $createdAt;

    /** @var GitHubBuildInProgress */
    private $sut;

    public function setUp()
    {
        $this->buildId   = new GitHubBuildId('R0hCdWlsZDoxMjM6MQ==');
        $this->createdAt = new DateTime('2018-01-01T00:01:00+00:00');
        $this->sut       = new GitHubBuildInProgress($this->buildId, $this->createdAt);
    }

    public function testCreate()
    {
        $buildId = new GitHubBuildId('R0hCdWlsZDoxMjM6MQ==');
        $result  = $this->sut->create($buildId);
        self::assertInstanceOf(GitHubBuildInProgress::class, $result);
    }

    public function testGetBuildId()
    {
        self::assertSame($this->buildId, $this->sut->getBuildId());
    }

    public function testGetCreatedAt()
    {
        self::assertSame($this->createdAt, $this->sut->getCreatedAt());
    }

    public function testSerialize()
    {
        $expected = [
            'buildId'   => 'R0hCdWlsZDoxMjM6MQ==',
            'createdAt' => '2018-01-01T00:01:00+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubBuildInProgress::deserialize(json_decode($serialized, true)));
    }
}
