<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationRepositorySelectionFactoryException;
use Exception;
use PhpSpec\ObjectBehavior;

class InstallationRepositorySelectionFactoryExceptionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationRepositorySelectionFactoryException::class);
        $this->shouldHaveType(Exception::class);
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn([]);
    }

    public function it_can_be_deserialized()
    {
        $input = [];

        $this->deserialize($input)->shouldReturnAnInstanceOf(InstallationRepositorySelectionFactoryException::class);
    }
}
