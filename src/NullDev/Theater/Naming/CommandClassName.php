<?php

declare(strict_types=1);

namespace NullDev\Theater\Naming;

use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;

/**
 * @see CommandClassNameSpec
 * @see CommandClassNameTest
 */
class CommandClassName extends ClassDefinition
{
    public static function create(string $fullName): self
    {
        return parent::createFromFullyQualified($fullName);
    }
}
