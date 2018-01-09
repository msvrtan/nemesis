<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Git\Tag;

use DevboardLib\Git\Tag\TagName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Git\Tag\TagName
 * @group  todo
 */
class TagNameTest extends TestCase
{
    /** @var string */
    private $name;

    /** @var TagName */
    private $sut;

    public function setUp()
    {
        $this->name = '0.1';
        $this->sut  = new TagName($this->name);
    }

    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testGetValue()
    {
        self::assertSame($this->name, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->name, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->name, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->name));
    }
}
