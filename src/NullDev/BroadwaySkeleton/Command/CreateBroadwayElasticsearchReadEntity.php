<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;

/**
 * @see CreateBroadwayElasticsearchReadEntitySpec
 * @see CreateBroadwayElasticsearchReadEntityTest
 */
class CreateBroadwayElasticsearchReadEntity
{
    /** @var ClassDefinition */
    private $entityClassDefinition;
    /** @var array */
    private $entityParameters;

    public function __construct(ClassDefinition $entityClassDefinition, array $entityParameters)
    {
        $this->entityClassDefinition  = $entityClassDefinition;
        $this->entityParameters       = $entityParameters;
    }

    public function getEntityClassDefinition(): ClassDefinition
    {
        return $this->entityClassDefinition;
    }

    public function getEntityParameters(): array
    {
        return $this->entityParameters;
    }
}
