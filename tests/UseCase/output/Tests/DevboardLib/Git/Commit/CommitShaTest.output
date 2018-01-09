<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Git\Commit;

use DevboardLib\Git\Commit\CommitSha;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Git\Commit\CommitSha
 * @group  todo
 */
class CommitShaTest extends TestCase
{
    /** @var string */
    private $sha;

    /** @var CommitSha */
    private $sut;

    public function setUp()
    {
        $this->sha = 'e54c3c97b4024b4a9b270b62921c6b830d780bd3';
        $this->sut = new CommitSha($this->sha);
    }

    public function testGetSha()
    {
        self::assertSame($this->sha, $this->sut->getSha());
    }

    public function testGetValue()
    {
        self::assertSame($this->sha, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->sha, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->sha, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->sha));
    }
}
