<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit\Tree;

use DevboardLib\GitHub\Commit\Tree\TreeApiUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\Tree\TreeApiUrl
 * @group  todo
 */
class TreeApiUrlTest extends TestCase
{
    /** @var string */
    private $url;

    /** @var TreeApiUrl */
    private $sut;

    public function setUp()
    {
        $this->url = 'https://api.github.com/repos/symfony/symfony-docs/git/trees/2cf1013cef32b574d7635169cf797b1dfcd110d2';
        $this->sut = new TreeApiUrl($this->url);
    }

    public function testGetUrl()
    {
        self::assertSame($this->url, $this->sut->getUrl());
    }

    public function testGetValue()
    {
        self::assertSame($this->url, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->url, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->url, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->url));
    }
}
