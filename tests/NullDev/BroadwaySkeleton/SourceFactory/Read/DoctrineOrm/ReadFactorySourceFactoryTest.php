<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadFactorySourceFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadFactorySourceFactory
 * @group  nemesis
 */
class ReadFactorySourceFactoryTest extends TestCase
{
    /** @var ReadFactorySourceFactory */
    private $readFactorySourceFactory;

    public function setUp(): void
    {
        $this->readFactorySourceFactory = new ReadFactorySourceFactory(new ClassSourceFactory(), new DefinitionFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
