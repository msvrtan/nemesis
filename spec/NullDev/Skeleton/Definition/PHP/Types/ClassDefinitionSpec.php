<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Definition\PHP\Types;

use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use PhpSpec\ObjectBehavior;

class ClassDefinitionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('ClassDefinition', 'Namespace1\\Namespace2');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ClassDefinition::class);
    }

    public function it_exposes_namespace()
    {
        $this->getNamespace()->shouldReturn('Namespace1\\Namespace2');
    }

    public function it_exposes_class_name()
    {
        $this->getName()->shouldReturn('ClassDefinition');
    }

    public function it_exposes_full_class_name()
    {
        $this->getFullName()->shouldReturn('Namespace1\\Namespace2\\ClassDefinition');
    }

    public function it_can_be_created_without_namespace()
    {
        $this->beConstructedWith('ClassDefinition');
        $this->hasNamespace()->shouldReturn(false);
        $this->getNamespace()->shouldReturn(null);
        $this->getName()->shouldReturn('ClassDefinition');
        $this->getFullName()->shouldReturn('ClassDefinition');
    }

    public function it_can_be_created_from_fully_qualified_name()
    {
        $result = $this->createFromFullyQualified('Namespace1\\Namespace2\\ClassDefinition');

        $result->shouldBeAnInstanceOf(ClassDefinition::class);
        $result->hasNamespace()->shouldReturn(true);
        $result->getNamespace()->shouldReturn('Namespace1\\Namespace2');
        $result->getName()->shouldReturn('ClassDefinition');
        $result->getFullName()->shouldReturn('Namespace1\\Namespace2\\ClassDefinition');
    }

    public function it_can_be_created_from_fully_qualified_name_without_namespace()
    {
        $result = $this->createFromFullyQualified('ClassDefinition');

        $result->shouldBeAnInstanceOf(ClassDefinition::class);
        $result->hasNamespace()->shouldReturn(false);
        $result->getNamespace()->shouldReturn(null);
        $result->getName()->shouldReturn('ClassDefinition');
        $result->getFullName()->shouldReturn('ClassDefinition');
    }
}
