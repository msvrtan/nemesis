<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Generix;

use DevboardLib\Generix\GravatarId;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Generix\GravatarId
 * @group  todo
 */
class GravatarIdTest extends TestCase
{
    /** @var string */
    private $id;

    /** @var GravatarId */
    private $sut;

    public function setUp()
    {
        $this->id  = '205e460b479e2e5b48aec07710c08d50';
        $this->sut = new GravatarId($this->id);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetValue()
    {
        self::assertSame($this->id, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->id, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->id, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->id));
    }
}
