<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationEvents;
use PhpSpec\ObjectBehavior;

class InstallationEventsSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($values = ['some-installation-event', 'another-installation-event']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationEvents::class);
    }

    public function it_exposes_values()
    {
        $this->getValues()->shouldReturn(['some-installation-event', 'another-installation-event']);
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(['some-installation-event', 'another-installation-event']);
    }

    public function it_can_be_deserialized()
    {
        $input = ['some-installation-event', 'another-installation-event'];

        $this->deserialize($input)->shouldReturnAnInstanceOf(InstallationEvents::class);
    }
}
