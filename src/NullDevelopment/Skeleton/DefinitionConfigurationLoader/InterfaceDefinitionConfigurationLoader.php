<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\Type\InterfaceDefinition;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\MethodCollectionFactory;

/**
 * @see InterfaceDefinitionConfigurationLoaderSpec
 * @see InterfaceDefinitionConfigurationLoaderTest
 */
class InterfaceDefinitionConfigurationLoader implements DefinitionConfigurationLoader
{
    /** @var ConstantCollectionFactory */
    private $constantCollectionFactory;
    /** @var MethodCollectionFactory */
    private $methodCollectionFactory;

    public function __construct(
        ConstantCollectionFactory $constantCollectionFactory,
        MethodCollectionFactory $methodCollectionFactory
    ) {
        $this->constantCollectionFactory = $constantCollectionFactory;
        $this->methodCollectionFactory   = $methodCollectionFactory;
    }

    public function supports(array $input): bool
    {
        if ('Interface' === $input['type']) {
            return true;
        }

        return false;
    }

    public function load(array $input): InterfaceDefinition
    {
        $data = array_merge($this->getDefaultValues(), $input);

        if (null !== $input['parent']) {
            $parent = InterfaceName::create($data['parent']);
        } else {
            $parent = null;
        }

        $constants = $this->constantCollectionFactory->create($input['constants']);
        $methods   = $this->methodCollectionFactory->create($input['methods']);

        return new InterfaceDefinition(InterfaceName::create($data['name']), $parent, $constants, $methods);
    }

    public function getDefaultValues(): array
    {
        return [
            'type'      => 'Interface',
            'name'      => null,
            'parent'    => null,
            'constants' => [],
            'methods'   => [],
        ];
    }
}