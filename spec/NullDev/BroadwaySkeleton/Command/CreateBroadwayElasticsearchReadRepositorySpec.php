<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Command;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadRepository;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use PhpSpec\ObjectBehavior;

class CreateBroadwayElasticsearchReadRepositorySpec extends ObjectBehavior
{
    public function let(ClassDefinition $repositoryClassDefinition)
    {
        $this->beConstructedWith($repositoryClassDefinition);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayElasticsearchReadRepository::class);
    }

    public function it_exposes_class_type_of_repository_to_build(ClassDefinition $repositoryClassDefinition)
    {
        $this->getRepositoryClassDefinition()->shouldReturn($repositoryClassDefinition);
    }
}
