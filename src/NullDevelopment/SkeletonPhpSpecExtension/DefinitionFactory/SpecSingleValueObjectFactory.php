<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecSingleValueObject;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SingleValueObject;
use Webmozart\Assert\Assert;

/**
 * @see SpecSingleValueObjectFactorySpec
 * @see SpecSingleValueObjectFactoryTest
 */
class SpecSingleValueObjectFactory
{
    /**
     * @var array
     */
    private $factories;

    public function __construct(array $factories)
    {
        Assert::allIsInstanceOf($factories, PhpSpecMethodFactory::class);
        $this->factories = $factories;
    }

    public function createFromSingleValueObject(SingleValueObject $definition): SpecSingleValueObject
    {
        $methods = [];

        foreach ($this->factories as $factory) {
            $methods = array_merge($methods, $factory->create($definition));
        }

        $specClassName  = ClassName::create('spec\\'.$definition->getInstanceOfFullName().'Spec');
        $specParentName = ClassName::create('PhpSpec\\ObjectBehavior');

        return new SpecSingleValueObject(
            $specClassName, $specParentName, [], [], [], [], $methods, $definition->getInstanceOf()
        );
    }
}
