<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\Method;

use NullDevelopment\PhpStructure\DataType\Property;

/**
 * @see SpecDateTimeCreateFromFormatMethodSpec
 * @see SpecDateTimeCreateFromFormatMethodTest
 */
class SpecDateTimeCreateFromFormatMethod extends BaseSpecMethod
{
    public function getName(): string
    {
        return 'it_can_be_created_from_custom_format';
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
