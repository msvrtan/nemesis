<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestDateTimeSetUpMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestDateTimeSetUpMethodFactory
 * @group  todo
 */
class TestDateTimeSetUpMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var TestDateTimeSetUpMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new TestDateTimeSetUpMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromConstructorMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}
