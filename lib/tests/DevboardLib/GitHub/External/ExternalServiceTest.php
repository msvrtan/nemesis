<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\External;

use DevboardLib\GitHub\External\ExternalService;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\External\ExternalService
 * @group  todo
 */
class ExternalServiceTest extends TestCase
{
    /** @var string */
    private $value;

    /** @var ExternalService */
    private $sut;

    public function setUp()
    {
        $this->value = 'value';
        $this->sut   = new ExternalService($this->value);
    }

    public function testGetValue()
    {
        self::assertSame($this->value, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertSame($this->value, $this->sut->__toString());
    }

    public function testSerialize()
    {
        self::assertEquals($this->value, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        self::assertEquals($this->sut, $this->sut->deserialize($this->value));
    }
}
