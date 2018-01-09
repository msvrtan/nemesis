<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubRepo\Domain\Command;

use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\Command\DeleteGitHubTag;
use DevboardLib\Git\Tag\TagName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Devboard\GitHubRepo\Domain\Command\DeleteGitHubTag
 * @group  todo
 */
class DeleteGitHubTagTest extends TestCase
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var TagName */
    private $name;

    /** @var DeleteGitHubTag */
    private $sut;

    public function setUp()
    {
        $this->id   = new GitHubRepoRootId('R0hSZXBvUm9vdDoxMjM=');
        $this->name = new TagName('0.1');
        $this->sut  = new DeleteGitHubTag($this->id, $this->name);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testSerialize()
    {
        $expected = [
            'id'   => 'R0hSZXBvUm9vdDoxMjM=',
            'name' => '0.1',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, DeleteGitHubTag::deserialize(json_decode($serialized, true)));
    }
}
