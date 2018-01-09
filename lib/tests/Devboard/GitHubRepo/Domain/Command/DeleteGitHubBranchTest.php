<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubRepo\Domain\Command;

use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\Command\DeleteGitHubBranch;
use DevboardLib\Git\Branch\BranchName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Devboard\GitHubRepo\Domain\Command\DeleteGitHubBranch
 * @group  todo
 */
class DeleteGitHubBranchTest extends TestCase
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var BranchName */
    private $name;

    /** @var DeleteGitHubBranch */
    private $sut;

    public function setUp()
    {
        $this->id   = new GitHubRepoRootId('R0hSZXBvUm9vdDoxMjM=');
        $this->name = new BranchName('master');
        $this->sut  = new DeleteGitHubBranch($this->id, $this->name);
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
            'name' => 'master',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, DeleteGitHubBranch::deserialize(json_decode($serialized, true)));
    }
}
