<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Uuid\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use NullDev\Skeleton\Uuid\Command\CreateUuidClass;
use PhpSpec\ObjectBehavior;

class CreateUuidClassSpec extends ObjectBehavior
{
    public function let(ClassDefinition $classType)
    {
        $this->beConstructedWith($classType);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateUuidClass::class);
    }

    public function it_will_expose_class_type(ClassDefinition $classType)
    {
        $this->getClassDefinition()->shouldReturn($classType);
    }
}
