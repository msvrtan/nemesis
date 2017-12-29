<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\SourceFactory;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\RepositoryConstructorMethod;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcingRepositorySourceFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class EventSourcingRepositorySourceFactorySpec extends ObjectBehavior
{
    public function let(ClassSourceFactory $sourceFactory, DefinitionFactory $definitionFactory)
    {
        $this->beConstructedWith($sourceFactory, $definitionFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EventSourcingRepositorySourceFactory::class);
    }

    public function it_will_create_source_from_given_class_type_and_target_entity(
        ClassSourceFactory $sourceFactory,
        DefinitionFactory $definitionFactory,
        ClassDefinition $classType,
        ImprovedClassSource $classSource,
        ClassDefinition $modelClassDefinition,
        RepositoryConstructorMethod $repositoryConstructorMethod
    ) {
        $sourceFactory
            ->create($classType)
            ->willReturn($classSource);

        $definitionFactory
            ->createBroadwayModelRepositoryConstructorMethod($modelClassDefinition)
            ->shouldBeCalled()
            ->willReturn($repositoryConstructorMethod);

        $this->create($classType, $modelClassDefinition)
            ->shouldReturn($classSource);
    }
}
