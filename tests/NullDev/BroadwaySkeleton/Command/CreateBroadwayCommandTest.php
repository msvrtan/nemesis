<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand
 * @group  todo
 */
class CreateBroadwayCommandTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassDefinition */
    private $classType;
    /** @var array */
    private $parameters;
    /** @var CreateBroadwayCommand */
    private $sut;

    public function setUp()
    {
        $this->classType  = Mockery::mock(ClassDefinition::class);
        $this->parameters = [];
        $this->sut        = new CreateBroadwayCommand($this->classType, $this->parameters);
    }

    public function testGetClassDefinition()
    {
        self::assertEquals($this->classType, $this->sut->getClassDefinition());
    }

    public function testGetParameters()
    {
        self::assertEquals($this->parameters, $this->sut->getParameters());
    }
}
