<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountType;
use PhpSpec\ObjectBehavior;

class AccountTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($type = 'User');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AccountType::class);
    }

    public function it_exposes_type()
    {
        $this->getType()->shouldReturn('User');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('User');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('User');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('User');
    }

    public function it_can_be_deserialized()
    {
        $input = 'User';

        $this->deserialize($input)->shouldReturnAnInstanceOf(AccountType::class);
    }
}
