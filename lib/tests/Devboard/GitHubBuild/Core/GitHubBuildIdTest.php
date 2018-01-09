<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubBuild\Core;

use Devboard\GitHubBuild\Core\GitHubBuildId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Devboard\GitHubBuild\Core\GitHubBuildId
 * @group  todo
 */
class GitHubBuildIdTest extends TestCase
{
    /** @var string */
    private $encodedValue;

    /** @var GitHubBuildId */
    private $sut;

    public function setUp()
    {
        $this->encodedValue = 'R0hCdWlsZDoxMjM6MQ==';
        $this->sut          = new GitHubBuildId($this->encodedValue);
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
