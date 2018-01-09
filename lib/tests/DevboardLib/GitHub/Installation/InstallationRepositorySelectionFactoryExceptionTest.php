<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationRepositorySelectionFactoryException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationRepositorySelectionFactoryException
 * @group  todo
 */
class InstallationRepositorySelectionFactoryExceptionTest extends TestCase
{
    /** @var InstallationRepositorySelectionFactoryException */
    private $sut;

    public function setUp()
    {
        $this->sut = new InstallationRepositorySelectionFactoryException();
    }

    public function testSerialize()
    {
        $expected = [
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals(
            $this->sut,
            InstallationRepositorySelectionFactoryException::deserialize(json_decode($serialized, true))
        );
    }
}
