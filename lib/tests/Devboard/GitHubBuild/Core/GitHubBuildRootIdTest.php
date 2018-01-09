<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubBuild\Core;

use Devboard\GitHubBuild\Core\GitHubBuildRootId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Devboard\GitHubBuild\Core\GitHubBuildRootId
 * @group  todo
 */
class GitHubBuildRootIdTest extends TestCase
{
    /** @var string */
    private $encodedValue;

    /** @var GitHubBuildRootId */
    private $sut;

    public function setUp()
    {
        $this->encodedValue = 'R0hCdWlsZFJvb3Q6MTIz';
        $this->sut          = new GitHubBuildRootId($this->encodedValue);
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
