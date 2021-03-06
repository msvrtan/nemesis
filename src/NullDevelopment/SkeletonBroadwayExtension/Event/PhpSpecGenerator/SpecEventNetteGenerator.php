<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator;

use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\SpecEvent;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\BaseSpecDefinitionGenerator;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\SpecEventNetteGeneratorSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpecGenerator\SpecEventNetteGeneratorTest
 */
class SpecEventNetteGenerator extends BaseSpecDefinitionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecEvent) {
            return true;
        }

        return false;
    }
}
