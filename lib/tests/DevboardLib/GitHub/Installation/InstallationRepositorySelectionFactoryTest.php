<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationRepositorySelectionFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationRepositorySelectionFactory
 * @group  todo
 */
class InstallationRepositorySelectionFactoryTest extends TestCase
{
    /** @var InstallationRepositorySelectionFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new InstallationRepositorySelectionFactory();
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
            $this->sut, InstallationRepositorySelectionFactory::deserialize(json_decode($serialized, true))
        );
    }
}
