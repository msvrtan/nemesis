<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubRepo\Core;

use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Devboard\GitHubRepo\Core\GitHubRepoRootId
 * @group  todo
 */
class GitHubRepoRootIdTest extends TestCase
{
    /** @var string */
    private $encodedValue;

    /** @var GitHubRepoRootId */
    private $sut;

    public function setUp()
    {
        $this->encodedValue = 'R0hSZXBvUm9vdDoxMjM=';
        $this->sut          = new GitHubRepoRootId($this->encodedValue);
    }

    public function testGetEncodedValue()
    {
        self::assertSame($this->encodedValue, $this->sut->getEncodedValue());
    }

    public function testGetId()
    {
        self::assertSame($this->encodedValue, $this->sut->getId());
    }

    public function testToString()
    {
        self::assertSame($this->encodedValue, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->encodedValue, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->encodedValue));
    }
}
