<?php

declare(strict_types=1);

namespace spec\DevboardLib\Git\Tag;

use DevboardLib\Git\Tag\TagName;
use Git\Reference\ReferenceName;
use PhpSpec\ObjectBehavior;

class TagNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($name = '0.1');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TagName::class);
        $this->shouldImplement(ReferenceName::class);
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('0.1');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('0.1');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('0.1');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('0.1');
    }

    public function it_can_be_deserialized()
    {
        $input = '0.1';

        $this->deserialize($input)->shouldReturnAnInstanceOf(TagName::class);
    }
}
