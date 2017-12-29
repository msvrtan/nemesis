<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadRepository;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadRepository
 * @group  todo
 */
class CreateBroadwayElasticsearchReadRepositoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassDefinition */
    private $repositoryClassDefinition;
    /** @var CreateBroadwayElasticsearchReadRepository */
    private $sut;

    public function setUp()
    {
        $this->repositoryClassDefinition = Mockery::mock(ClassDefinition::class);
        $this->sut                       = new CreateBroadwayElasticsearchReadRepository($this->repositoryClassDefinition);
    }

    public function testGetRepositoryClassDefinition()
    {
        self::assertEquals($this->repositoryClassDefinition, $this->sut->getRepositoryClassDefinition());
    }
}
