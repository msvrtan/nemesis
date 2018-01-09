<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Git\Commit;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\Git\Commit\CommitTree;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Git\Commit\CommitTree
 * @group  todo
 */
class CommitTreeTest extends TestCase
{
    /** @var CommitSha */
    private $sha;

    /** @var CommitTree */
    private $sut;

    public function setUp()
    {
        $this->sha = new CommitSha('02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0');
        $this->sut = new CommitTree($this->sha);
    }

    public function testGetSha()
    {
        self::assertSame($this->sha, $this->sut->getSha());
    }

    public function testSerialize()
    {
        self::assertEquals($this->sha->serialize(), $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitTree::deserialize(json_decode($serialized, true)));
    }
}
