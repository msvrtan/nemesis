<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

/**
 * @see PropertyCollectionFactorySpec
 * @see PropertyCollectionFactoryTest
 */
class PropertyCollectionFactory
{
    /** @return Property[] */
    public function create(?array $input): array
    {
        if (null === $input) {
            return [];
        }

        $result = [];

        foreach ($input as $name => $item) {
            $data = array_merge($this->getDefaultValues(), $item);

            $result[] = new Property(
                $name,
                ClassName::create($data['name']),
                $data['nullable'],
                $data['hasDefault'],
                $data['default'],
                new Visibility($data['visibility'])
            );
        }

        return $result;
    }

    private function getDefaultValues()
    {
        return [
            'name'       => 'integer',
            'nullable'   => false,
            'hasDefault' => false,
            'default'    => null,
            'visibility' => Visibility::PRIVATE,
        ];
    }
}