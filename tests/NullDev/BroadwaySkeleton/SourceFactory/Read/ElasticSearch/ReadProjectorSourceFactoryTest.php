<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch;

use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadProjectorSourceFactory;
use NullDev\Skeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadProjectorSourceFactory
 * @group nemesis
 */
class ReadProjectorSourceFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var ReadProjectorSourceFactory */
    private $readProjectorSourceFactory;

    public function setUp(): void
    {
        $this->readProjectorSourceFactory = new ReadProjectorSourceFactory(new ClassSourceFactory(), new DefinitionFactory());
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}