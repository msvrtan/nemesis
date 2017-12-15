<?php

namespace tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadEntity;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadEntity
 * @group  todo
 */
class CreateBroadwayDoctrineOrmReadEntityTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassType */
    private $entityClassType;
    /** @var array */
    private $entityParameters;
    /** @var CreateBroadwayDoctrineOrmReadEntity */
    private $sut;

    public function setUp()
    {
        $this->entityClassType  = Mockery::mock(ClassType::class);
        $this->entityParameters = [];
        $this->sut              = new CreateBroadwayDoctrineOrmReadEntity($this->entityClassType, $this->entityParameters);
    }

    public function testGetEntityClassType()
    {
        self::assertEquals($this->entityClassType, $this->sut->getEntityClassType());
    }

    public function testGetEntityParameters()
    {
        self::assertEquals($this->entityParameters, $this->sut->getEntityParameters());
    }
}