<?php

declare(strict_types=1);

namespace spec\DevboardLib\Generix;

use DevboardLib\Generix\EmailAddress;
use PhpSpec\ObjectBehavior;

class EmailAddressSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($value = 'john@example.com');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EmailAddress::class);
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('john@example.com');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('john@example.com');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('john@example.com');
    }

    public function it_can_be_deserialized()
    {
        $input = 'john@example.com';

        $this->deserialize($input)->shouldReturnAnInstanceOf(EmailAddress::class);
    }
}
