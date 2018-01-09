<?php

declare(strict_types=1);

namespace spec\DevboardLib\Generix;

use DevboardLib\Generix\GravatarId;
use PhpSpec\ObjectBehavior;

class GravatarIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = '205e460b479e2e5b48aec07710c08d50');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GravatarId::class);
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn('205e460b479e2e5b48aec07710c08d50');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('205e460b479e2e5b48aec07710c08d50');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('205e460b479e2e5b48aec07710c08d50');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('205e460b479e2e5b48aec07710c08d50');
    }

    public function it_can_be_deserialized()
    {
        $input = '205e460b479e2e5b48aec07710c08d50';

        $this->deserialize($input)->shouldReturnAnInstanceOf(GravatarId::class);
    }
}
