<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\CompilerPass;

use NullDevelopment\Skeleton\ObjectConfigurationLoaderCollection;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @codeCoverageIgnore
 */
class ObjectConfigurationLoaderCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has(ObjectConfigurationLoaderCollection::class)) {
            return;
        }

        $definition = $container->findDefinition(ObjectConfigurationLoaderCollection::class);

        $taggedServices = $container->findTaggedServiceIds('skeleton.object_configuration_loader');

        $references = [];

        foreach (array_keys($taggedServices) as $id) {
            $references[] = new Reference($id);
        }

        $definition->setArgument(0, $references);
    }
}
