<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Source;

use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;

/**
 * @see ClassSourceFactorySpec
 * @see ClassSourceFactoryTest
 */
class ClassSourceFactory
{
    public function create(ClassDefinition $classType): ImprovedClassSource
    {
        return new ImprovedClassSource($classType);
    }

    public function createSpec(ClassDefinition $classType): ImprovedSpecSource
    {
        return new ImprovedSpecSource($classType);
    }

    public function createTest(ClassDefinition $classType): ImprovedTestSource
    {
        return new ImprovedTestSource($classType);
    }
}
