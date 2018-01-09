<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Domain\Event;

use Broadway\Serializer\Serializable;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\Event\GitHubTagDeleted;
use Devboard\GitHubRepo\Domain\Event\GitHubTagEvent;
use DevboardLib\Git\Tag\TagName;
use PhpSpec\ObjectBehavior;

class GitHubTagDeletedSpec extends ObjectBehavior
{
    public function let(GitHubRepoRootId $id, TagName $name, DateTime $deletedAt)
    {
        $this->beConstructedWith($id, $name, $deletedAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubTagDeleted::class);
        $this->shouldImplement(GitHubTagEvent::class);
        $this->shouldImplement(Serializable::class);
    }

    public function it_has_a_helper_factory_method(GitHubRepoRootId $id, TagName $name)
    {
        $this->create($id, $name)->shouldReturnAnInstanceOf(GitHubTagDeleted::class);
    }

    public function it_exposes_id(GitHubRepoRootId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_name(TagName $name)
    {
        $this->getName()->shouldReturn($name);
    }

    public function it_exposes_deleted_at(DateTime $deletedAt)
    {
        $this->getDeletedAt()->shouldReturn($deletedAt);
    }

    public function it_can_be_serialized(GitHubRepoRootId $id, TagName $name, DateTime $deletedAt)
    {
        $id->serialize()->shouldBeCalled()->willReturn('R0hSZXBvUm9vdDoxMjM=');
        $name->serialize()->shouldBeCalled()->willReturn('0.1');
        $deletedAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn(
            ['id' => 'R0hSZXBvUm9vdDoxMjM=', 'name' => '0.1', 'deletedAt' => '2018-01-01T00:01:00+00:00']
        );
    }

    public function it_can_be_deserialized()
    {
        $input = ['id' => 'R0hSZXBvUm9vdDoxMjM=', 'name' => '0.1', 'deletedAt' => '2018-01-01T00:01:00+00:00'];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubTagDeleted::class);
    }
}
