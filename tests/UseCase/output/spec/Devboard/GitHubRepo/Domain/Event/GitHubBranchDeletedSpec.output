<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Domain\Event;

use Broadway\Serializer\Serializable;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\Event\GitHubBranchDeleted;
use Devboard\GitHubRepo\Domain\Event\GitHubBranchEvent;
use DevboardLib\Git\Branch\BranchName;
use PhpSpec\ObjectBehavior;

class GitHubBranchDeletedSpec extends ObjectBehavior
{
    public function let(GitHubRepoRootId $id, BranchName $name, DateTime $deletedAt)
    {
        $this->beConstructedWith($id, $name, $deletedAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBranchDeleted::class);
        $this->shouldImplement(GitHubBranchEvent::class);
        $this->shouldImplement(Serializable::class);
    }

    public function it_has_a_helper_factory_method(GitHubRepoRootId $id, BranchName $name)
    {
        $this->create($id, $name)->shouldReturnAnInstanceOf(GitHubBranchDeleted::class);
    }

    public function it_exposes_id(GitHubRepoRootId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_name(BranchName $name)
    {
        $this->getName()->shouldReturn($name);
    }

    public function it_exposes_deleted_at(DateTime $deletedAt)
    {
        $this->getDeletedAt()->shouldReturn($deletedAt);
    }

    public function it_can_be_serialized(GitHubRepoRootId $id, BranchName $name, DateTime $deletedAt)
    {
        $id->serialize()->shouldBeCalled()->willReturn('R0hSZXBvUm9vdDoxMjM=');
        $name->serialize()->shouldBeCalled()->willReturn('master');
        $deletedAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn(
            ['id' => 'R0hSZXBvUm9vdDoxMjM=', 'name' => 'master', 'deletedAt' => '2018-01-01T00:01:00+00:00']
        );
    }

    public function it_can_be_deserialized()
    {
        $input = ['id' => 'R0hSZXBvUm9vdDoxMjM=', 'name' => 'master', 'deletedAt' => '2018-01-01T00:01:00+00:00'];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubBranchDeleted::class);
    }
}
