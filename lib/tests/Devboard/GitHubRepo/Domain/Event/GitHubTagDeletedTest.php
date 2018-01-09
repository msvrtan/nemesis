<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubRepo\Domain\Event;

use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\Event\GitHubTagDeleted;
use DevboardLib\Git\Tag\TagName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Devboard\GitHubRepo\Domain\Event\GitHubTagDeleted
 * @group  todo
 */
class GitHubTagDeletedTest extends TestCase
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var TagName */
    private $name;

    /** @var DateTime */
    private $deletedAt;

    /** @var GitHubTagDeleted */
    private $sut;

    public function setUp()
    {
        $this->id        = new GitHubRepoRootId('R0hSZXBvUm9vdDoxMjM=');
        $this->name      = new TagName('0.1');
        $this->deletedAt = new DateTime('2018-01-01T00:01:00+00:00');
        $this->sut       = new GitHubTagDeleted($this->id, $this->name, $this->deletedAt);
    }

    public function testCreate()
    {
        $id     = new GitHubRepoRootId('R0hSZXBvUm9vdDoxMjM=');
        $name   = new TagName('0.1');
        $result = $this->sut->create($id, $name);
        self::assertInstanceOf(GitHubTagDeleted::class, $result);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testGetDeletedAt()
    {
        self::assertSame($this->deletedAt, $this->sut->getDeletedAt());
    }

    public function testSerialize()
    {
        $expected = [
            'id'        => 'R0hSZXBvUm9vdDoxMjM=',
            'name'      => '0.1',
            'deletedAt' => '2018-01-01T00:01:00+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubTagDeleted::deserialize(json_decode($serialized, true)));
    }
}
