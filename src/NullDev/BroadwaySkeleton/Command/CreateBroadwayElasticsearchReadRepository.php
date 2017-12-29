<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;

/**
 * @see CreateBroadwayElasticsearchReadRepositorySpec
 * @see CreateBroadwayElasticsearchReadRepositoryTest
 */
class CreateBroadwayElasticsearchReadRepository
{
    /** @var ClassDefinition */
    private $repositoryClassDefinition;

    public function __construct(ClassDefinition $repositoryClassDefinition)
    {
        $this->repositoryClassDefinition = $repositoryClassDefinition;
    }

    public function getRepositoryClassDefinition(): ClassDefinition
    {
        return $this->repositoryClassDefinition;
    }
}
