<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\SourceFactory;

use Broadway\Serializer\Serializable;
use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Definition\PHP\Property;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use NullDev\Skeleton\Definition\PHP\Types\InterfaceType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\SourceFactory\SourceFactory;

class EventSourceFactory implements SourceFactory
{
    /** @var ClassSourceFactory */
    private $sourceFactory;
    /** @var DefinitionFactory */
    private $definitionFactory;

    public function __construct(ClassSourceFactory $sourceFactory, DefinitionFactory $definitionFactory)
    {
        $this->sourceFactory     = $sourceFactory;
        $this->definitionFactory = $definitionFactory;
    }

    public function create(ClassDefinition $classType, array $parameters)
    {
        $source = $this->sourceFactory->create($classType);

        //Add constructor method.
        $source->addConstructorMethod($this->definitionFactory->createConstructorMethod($parameters));
        foreach ($parameters as $parameter) {
            $property = Property::createFromParameter($parameter);
            $source->addGetterMethod($property);
            $source->addProperty($property);
        }
        //Adds Broadway Serializable.
        $source->addInterface(InterfaceType::createFromFullyQualified(Serializable::class));
        //Adds serialize() method.
        $source->addMethod($this->definitionFactory->createSerializeMethod($source));
        //Adds static deserialize() method.
        $source->addMethod($this->definitionFactory->createDeserializeMethod($source));

        return $source;
    }
}
