<?php

declare(strict_types=1);

namespace Tests\MyVendor;

use DateTime;
use MyVendor\User\UserCreatedAt;
use MyVendor\User\UserFirstName;
use MyVendor\User\UserId;
use MyVendor\User\Username;
use MyVendor\UserCollection;
use MyVendor\UserEntity;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyVendor\UserCollection
 * @group  todo
 */
class UserCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var UserCollection */
    private $sut;

    public function setUp()
    {
        $this->elements = [
            new UserEntity(
                new UserId(1),
                new UserFirstName('Amy'),
                'lastName',
                new Username('username'),
                true,
                new UserCreatedAt('2018-01-01T00:01:00+00:00'),
                new DateTime('2018-01-01T00:01:00+00:00')
            ),
        ];
        $this->sut = new UserCollection($this->elements);
    }

    public function testGetElements()
    {
        self::assertSame($this->elements, $this->sut->toArray());
    }

    public function testSerializeAndDeserialize()
    {
        $serialized     = $this->sut->serialize();
        $serializedJson = json_encode($serialized);
        self::assertEquals($this->sut, $this->sut->deserialize(json_decode($serializedJson, true)));
    }
}
