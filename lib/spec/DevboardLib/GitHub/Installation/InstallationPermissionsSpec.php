<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationPermissions;
use PhpSpec\ObjectBehavior;

class InstallationPermissionsSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($values = ['some-installation-permission', 'another-installation-permission']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationPermissions::class);
    }

    public function it_exposes_values()
    {
        $this->getValues()->shouldReturn(['some-installation-permission', 'another-installation-permission']);
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(['some-installation-permission', 'another-installation-permission']);
    }

    public function it_can_be_deserialized()
    {
        $input = ['some-installation-permission', 'another-installation-permission'];

        $this->deserialize($input)->shouldReturnAnInstanceOf(InstallationPermissions::class);
    }
}
