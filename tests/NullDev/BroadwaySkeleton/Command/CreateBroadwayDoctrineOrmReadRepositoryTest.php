<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadRepository;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadRepository
 * @group  todo
 */
class CreateBroadwayDoctrineOrmReadRepositoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassDefinition */
    private $repositoryClassDefinition;
    /** @var CreateBroadwayDoctrineOrmReadRepository */
    private $sut;

    public function setUp()
    {
        $this->repositoryClassDefinition = Mockery::mock(ClassDefinition::class);
        $this->sut                       = new CreateBroadwayDoctrineOrmReadRepository($this->repositoryClassDefinition);
    }

    public function testGetRepositoryClassDefinition()
    {
        self::assertEquals($this->repositoryClassDefinition, $this->sut->getRepositoryClassDefinition());
    }
}
