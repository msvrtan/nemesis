<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

/**
 * @see TestDeserializeMethodSpec
 * @see TestDeserializeMethodTest
 */
class TestDeserializeMethod extends BaseTestMethod
{
    /** @var ClassName */
    private $className;

    /** @var array|Property[] */
    private $properties;

    /** @param array|Property[] $properties */
    public function __construct(ClassName $className, array $properties)
    {
        $this->className  = $className;
        $this->properties = $properties;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    /** @return Property[] */
    public function getProperties(): array
    {
        return $this->properties;
    }

    public function getName(): string
    {
        return 'testDeserialize';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        $parameters = [];

        foreach ($this->properties as $property) {
            if (true === $property->isObject()) {
                $parameters[] = $property;
            }
        }

        return $parameters;
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        $imports = [];

        foreach ($this->properties as $property) {
            if (true === $property->isObject()) {
                $imports[] = $property->getInstanceName();
            }
        }

        return $imports;
    }
}
