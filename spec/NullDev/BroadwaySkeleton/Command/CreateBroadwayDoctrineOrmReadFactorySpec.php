<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Command;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use PhpSpec\ObjectBehavior;

class CreateBroadwayDoctrineOrmReadFactorySpec extends ObjectBehavior
{
    public function let(ClassDefinition $factoryClassDefinition)
    {
        $this->beConstructedWith($factoryClassDefinition);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayDoctrineOrmReadFactory::class);
    }

    public function it_exposes_class_type_of_factory_to_build(ClassDefinition $factoryClassDefinition)
    {
        $this->getFactoryClassDefinition()->shouldReturn($factoryClassDefinition);
    }
}
