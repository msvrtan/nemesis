<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadEntity;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadEntity
 * @group  todo
 */
class CreateBroadwayElasticsearchReadEntityTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassDefinition */
    private $entityClassDefinition;
    /** @var array */
    private $entityParameters;
    /** @var CreateBroadwayElasticsearchReadEntity */
    private $sut;

    public function setUp()
    {
        $this->entityClassDefinition  = Mockery::mock(ClassDefinition::class);
        $this->entityParameters       = [];
        $this->sut                    = new CreateBroadwayElasticsearchReadEntity($this->entityClassDefinition, $this->entityParameters);
    }

    public function testGetEntityClassDefinition()
    {
        self::assertEquals($this->entityClassDefinition, $this->sut->getEntityClassDefinition());
    }

    public function testGetEntityParameters()
    {
        self::assertEquals($this->entityParameters, $this->sut->getEntityParameters());
    }
}
