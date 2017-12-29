<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Uuid\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use NullDev\Skeleton\Uuid\Command\CreateUuidClass;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Uuid\Command\CreateUuidClass
 * @group  todo
 */
class CreateUuidClassTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassDefinition */
    private $classType;
    /** @var CreateUuidClass */
    private $sut;

    public function setUp()
    {
        $this->classType = Mockery::mock(ClassDefinition::class);
        $this->sut       = new CreateUuidClass($this->classType);
    }

    public function testGetClassDefinition()
    {
        self::assertEquals($this->classType, $this->sut->getClassDefinition());
    }
}
