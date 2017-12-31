<?php

declare(strict_types=1);

namespace spec\DevboardLib\Git\Commit\Author;

use DevboardLib\Git\Commit\Author\AuthorName;
use Git\Commit\Author\AuthorName as AuthorNameInterface;
use PhpSpec\ObjectBehavior;

class AuthorNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($name = 'John Smith');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AuthorName::class);
        $this->shouldImplement(AuthorNameInterface::class);
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('John Smith');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('John Smith');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('John Smith');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('John Smith');
    }

    public function it_can_be_deserialized()
    {
        $input = 'John Smith';

        $this->deserialize($input)->shouldReturnAnInstanceOf(AuthorName::class);
    }
}
