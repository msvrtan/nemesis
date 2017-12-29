<?php

declare(strict_types=1);

namespace NullDev\Theater\ReadSide;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;

/**
 * @see ReadSideConfigFactorySpec
 * @see ReadSideConfigFactoryTest
 */
class ReadSideConfigFactory
{
    public function create(
        ReadSideName $name,
        ReadSideNamespace $namespace,
        ReadSideImplementation $implementation,
        array $properties
    ): ReadSideConfig {
        $base = $namespace->getValue().'\\'.$name->getValue();

        return new ReadSideConfig(
            $name,
            $namespace,
            $implementation,
            ClassDefinition::createFromFullyQualified($base.'Entity'),
            ClassDefinition::createFromFullyQualified($base.'Repository'),
            ClassDefinition::createFromFullyQualified($base.'Projector'),
            ClassDefinition::createFromFullyQualified($base.'Factory'),
            $properties
        );
    }

    public function createFromArray(string $name, array $data): ReadSideConfig
    {
        $factory = null;

        if (true === array_key_exists('factory', $data['classes']) && null !== $data['classes']['factory']) {
            $factory = ClassDefinition::createFromFullyQualified($data['classes']['factory']);
        }

        $properties = [];
        foreach ($data['properties'] as $propertyName => $propertyType) {
            $properties[] = Parameter::create($propertyName, $propertyType);
        }

        $config = new ReadSideConfig(
            new ReadSideName($name),
            new ReadSideNamespace($data['namespace']),
            new ReadSideImplementation($data['implementation']),
            ClassDefinition::createFromFullyQualified($data['classes']['entity']),
            ClassDefinition::createFromFullyQualified($data['classes']['repository']),
            ClassDefinition::createFromFullyQualified($data['classes']['projector']),
            $factory,
            $properties
        );

        return $config;
    }
}
