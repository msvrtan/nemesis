<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Uuid\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;

/**
 * @see CreateUuidClassSpec
 * @see CreateUuidClassTest
 */
class CreateUuidClass
{
    /** @var ClassDefinition */
    private $classType;

    public function __construct(ClassDefinition $classType)
    {
        $this->classType = $classType;
    }

    public function getClassDefinition(): ClassDefinition
    {
        return $this->classType;
    }
}
