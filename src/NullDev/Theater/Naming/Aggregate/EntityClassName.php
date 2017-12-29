<?php

declare(strict_types=1);

namespace NullDev\Theater\Naming\Aggregate;

use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;

/**
 * @see EntityClassNameSpec
 * @see EntityClassNameTest
 */
class EntityClassName extends ClassDefinition
{
    public static function create(string $fullName): self
    {
        return parent::createFromFullyQualified($fullName);
    }
}
