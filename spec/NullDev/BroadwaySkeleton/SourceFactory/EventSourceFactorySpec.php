<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\SourceFactory;

use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\DeserializeMethod;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\SerializeMethod;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourceFactory;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class EventSourceFactorySpec extends ObjectBehavior
{
    public function let(ClassSourceFactory $sourceFactory, DefinitionFactory $definitionFactory)
    {
        $this->beConstructedWith($sourceFactory, $definitionFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EventSourceFactory::class);
    }

    public function it_will_create_source_from_given_class_type_and_constructor_params(
        ClassSourceFactory $sourceFactory,
        DefinitionFactory $definitionFactory,
        ClassDefinition $classType,
        ImprovedClassSource $classSource,
        Parameter $parameter1,
        Parameter $parameter2,
        ConstructorMethod $constructorMethod,
        SerializeMethod $serializeMethod,
        DeserializeMethod $deserializeMethod
    ) {
        $sourceFactory
            ->create($classType)
            ->willReturn($classSource);

        $definitionFactory
            ->createConstructorMethod([$parameter1, $parameter2])
            ->shouldBeCalled()
            ->willReturn($constructorMethod);

        $definitionFactory
            ->createSerializeMethod($classSource)
            ->shouldBeCalled()
            ->willReturn($serializeMethod);

        $definitionFactory
            ->createDeserializeMethod($classSource)
            ->shouldBeCalled()
            ->willReturn($deserializeMethod);

        $parameter1->getName()->shouldBeCalled()->willReturn('param1name');
        $parameter2->getName()->shouldBeCalled()->willReturn('param2name');
        $parameter1->getType()->shouldBeCalled()->willReturn(null);
        $parameter2->getType()->shouldBeCalled()->willReturn(null);

        $this->create($classType, [$parameter1, $parameter2])
            ->shouldReturn($classSource);
    }
}
