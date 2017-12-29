<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadProjector;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadProjector
 * @group  todo
 */
class CreateBroadwayElasticsearchReadProjectorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassDefinition */
    private $projectorClassDefinition;
    /** @var array */
    private $entityParameters;
    /** @var CreateBroadwayElasticsearchReadProjector */
    private $sut;

    public function setUp()
    {
        $this->projectorClassDefinition = Mockery::mock(ClassDefinition::class);
        $this->entityParameters         = [];
        $this->sut                      = new CreateBroadwayElasticsearchReadProjector($this->projectorClassDefinition, $this->entityParameters);
    }

    public function testGetProjectorClassDefinition()
    {
        self::assertEquals($this->projectorClassDefinition, $this->sut->getProjectorClassDefinition());
    }

    public function testGetEntityParameters()
    {
        self::assertEquals($this->entityParameters, $this->sut->getEntityParameters());
    }
}
