<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHP\Types;

/**
 * @see ClassDefinitionSpec
 * @see ClassDefinitionTest
 */
class ClassDefinition extends ConceptName
{
    public static function createFromFullyQualified(string $fullName)
    {
        return parent::createFromFullyQualified($fullName);
    }
}
