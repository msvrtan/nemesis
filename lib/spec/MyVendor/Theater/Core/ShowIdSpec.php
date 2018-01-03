<?php

declare(strict_types=1);

namespace spec\MyVendor\Theater\Core;

use MyVendor\Theater\Core\ShowId;
use PhpSpec\ObjectBehavior;

class ShowIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = 'id');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ShowId::class);
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn('id');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('id');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('id');
    }

    public function it_can_be_deserialized()
    {
        $input = 'id';

        $this->deserialize($input)->shouldReturnAnInstanceOf(ShowId::class);
    }
}
