<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationRepositorySelectionFactory;
use PhpSpec\ObjectBehavior;

class InstallationRepositorySelectionFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationRepositorySelectionFactory::class);
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn([]);
    }

    public function it_can_be_deserialized()
    {
        $input = [];

        $this->deserialize($input)->shouldReturnAnInstanceOf(InstallationRepositorySelectionFactory::class);
    }
}
