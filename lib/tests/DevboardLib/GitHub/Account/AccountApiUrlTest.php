<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountApiUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Account\AccountApiUrl
 * @group  todo
 */
class AccountApiUrlTest extends TestCase
{
    /** @var string */
    private $url;

    /** @var AccountApiUrl */
    private $sut;

    public function setUp()
    {
        $this->url = 'https://api.github.com/users/baxterthehacker';
        $this->sut = new AccountApiUrl($this->url);
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
