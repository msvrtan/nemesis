<?php

declare(strict_types=1);

namespace NullDev\Theater\Naming\Aggregate;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;

/**
 * @see RootIdClassNameSpec
 * @see RootIdClassNameTest
 */
class RootIdClassName extends ClassType
{
    public static function create(string $fullName): self
    {
        return parent::createFromFullyQualified($fullName);
    }
}
