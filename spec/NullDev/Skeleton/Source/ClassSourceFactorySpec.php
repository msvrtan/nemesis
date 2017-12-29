<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Source;

use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class ClassSourceFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(ClassSourceFactory::class);
    }

    public function it_will_create_class_source_from_given_class_type(ClassDefinition $classType)
    {
        $this->create($classType)->shouldReturnAnInstanceOf(ImprovedClassSource::class);
    }
}
