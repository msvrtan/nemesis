<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;

/**
 * @see CreateBroadwayDoctrineOrmReadFactorySpec
 * @see CreateBroadwayDoctrineOrmReadFactoryTest
 */
class CreateBroadwayDoctrineOrmReadFactory
{
    /** @var ClassDefinition */
    private $factoryClassDefinition;

    public function __construct(ClassDefinition $factoryClassDefinition)
    {
        $this->factoryClassDefinition = $factoryClassDefinition;
    }

    public function getFactoryClassDefinition(): ClassDefinition
    {
        return $this->factoryClassDefinition;
    }
}
