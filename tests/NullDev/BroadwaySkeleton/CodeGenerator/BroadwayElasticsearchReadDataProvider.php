<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\CodeGenerator;

use DateTime;
use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use Ramsey\Uuid\Uuid;

class BroadwayElasticsearchReadDataProvider
{
    public function provideBroadwayElasticSearchReadEntity(): ImprovedClassSource
    {
        $classType  = new ClassDefinition('ProductReadEntity', 'MyShop\ReadModel\Product');
        $parameters = [
            Parameter::create('productId', Uuid::class),
            Parameter::create('title', 'string'),
            Parameter::create('quantity', 'int'),
            Parameter::create('locationsAvailable', 'array'),
            Parameter::create('createdAt', DateTime::class),
        ];

        $factory = new ElasticSearch\ReadEntitySourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType, $parameters);
    }

    public function provideBroadwayElasticSearchReadRepository(): ImprovedClassSource
    {
        $classType = new ClassDefinition('ProductReadRepository', 'MyShop\ReadModel\Product');

        $factory = new ElasticSearch\ReadRepositorySourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType);
    }

    public function provideBroadwayElasticSearchReadProjector(): ImprovedClassSource
    {
        $classType  = new ClassDefinition('ProductReadProjector', 'MyShop\ReadModel\Product');
        $parameters = [
            Parameter::create('repository', 'MyShop\ReadModel\Product\ProductReadRepository'),
        ];
        $factory = new ElasticSearch\ReadProjectorSourceFactory(new ClassSourceFactory(), new DefinitionFactory());

        return $factory->create($classType, $parameters);
    }
}
