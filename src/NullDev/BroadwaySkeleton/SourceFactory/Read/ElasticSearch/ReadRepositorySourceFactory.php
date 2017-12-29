<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch;

use Broadway\ReadModel\ElasticSearch\ElasticSearchRepository;
use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\SourceFactory\SourceFactory;

class ReadRepositorySourceFactory implements SourceFactory
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

    public function create(ClassDefinition $classType)
    {
        $source = $this->sourceFactory->create($classType);

        //Adds ElasticSearchRepository as parent.
        $source->addParent(ClassDefinition::createFromFullyQualified(ElasticSearchRepository::class));

        return $source;
    }
}
