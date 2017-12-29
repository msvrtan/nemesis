<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;

/**
 * @see CreateBroadwayDoctrineOrmReadProjectorSpec
 * @see CreateBroadwayDoctrineOrmReadProjectorTest
 */
class CreateBroadwayDoctrineOrmReadProjector
{
    /** @var ClassDefinition */
    private $projectorClassDefinition;
    /** @var array */
    private $entityParameters;

    public function __construct(ClassDefinition $projectorClassDefinition, array $entityParameters
    ) {
        $this->projectorClassDefinition = $projectorClassDefinition;
        $this->entityParameters         = $entityParameters;
    }

    public function getProjectorClassDefinition(): ClassDefinition
    {
        return $this->projectorClassDefinition;
    }

    public function getEntityParameters(): array
    {
        return $this->entityParameters;
    }
}
