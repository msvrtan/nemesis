<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadFactory
 * @group  todo
 */
class CreateBroadwayDoctrineOrmReadFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassDefinition */
    private $factoryClassDefinition;
    /** @var CreateBroadwayDoctrineOrmReadFactory */
    private $sut;

    public function setUp()
    {
        $this->factoryClassDefinition = Mockery::mock(ClassDefinition::class);
        $this->sut                    = new CreateBroadwayDoctrineOrmReadFactory($this->factoryClassDefinition);
    }

    public function testGetFactoryClassDefinition()
    {
        self::assertEquals($this->factoryClassDefinition, $this->sut->getFactoryClassDefinition());
    }
}
