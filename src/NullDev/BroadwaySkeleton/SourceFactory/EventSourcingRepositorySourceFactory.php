<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\SourceFactory;

use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStore;
use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use NullDev\Skeleton\Source\ClassSourceFactory;

class EventSourcingRepositorySourceFactory
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

    public function create(ClassDefinition $classType, ClassDefinition $modelClassDefinition)
    {
        $source = $this->sourceFactory->create($classType);

        $source->addParent(ClassDefinition::createFromFullyQualified(EventSourcingRepository::class));

        $source->addImport(
            ClassDefinition::createFromFullyQualified(PublicConstructorAggregateFactory::class)
        );
        $source->addImport(
            ClassDefinition::createFromFullyQualified(EventBus::class)
        );
        $source->addImport(
            ClassDefinition::createFromFullyQualified(EventStore::class)
        );

        //Add aggregate root id as property.
        //Add constructor which calls parent constructor method.
        $source->addMethod(
            $this->definitionFactory->createBroadwayModelRepositoryConstructorMethod($modelClassDefinition)
        );

        return $source;
    }
}
