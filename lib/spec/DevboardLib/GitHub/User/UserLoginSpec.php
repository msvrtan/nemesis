<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserLogin;
use PhpSpec\ObjectBehavior;

class UserLoginSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($login = 'octocat');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UserLogin::class);
    }

    public function it_exposes_login()
    {
        $this->getLogin()->shouldReturn('octocat');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('octocat');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('octocat');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('octocat');
    }

    public function it_can_be_deserialized()
    {
        $input = 'octocat';

        $this->deserialize($input)->shouldReturnAnInstanceOf(UserLogin::class);
    }
}