<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\Method;

use NullDevelopment\PhpStructure\DataType\Property;

/**
 * @see SpecDateTimeToStringMethodSpec
 * @see SpecDateTimeToStringMethodTest
 */
class SpecDateTimeToStringMethod extends BaseSpecMethod
{
    public function getName(): string
    {
        return 'it_is_castable_to_string';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return [];
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        return [];
    }
}
