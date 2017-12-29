<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\ClassDefinition;

interface PhpUnitMethodFactory
{
    /** @return Method[] */
    public function create(ClassDefinition $definition): array;
}
