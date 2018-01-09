<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Domain\Command;

use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\Command\DeleteGitHubTag;
use DevboardLib\Git\Tag\TagName;
use PhpSpec\ObjectBehavior;

class DeleteGitHubTagSpec extends ObjectBehavior
{
    public function let(GitHubRepoRootId $id, TagName $name)
    {
        $this->beConstructedWith($id, $name);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DeleteGitHubTag::class);
    }

    public function it_exposes_id(GitHubRepoRootId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_name(TagName $name)
    {
        $this->getName()->shouldReturn($name);
    }

    public function it_can_be_serialized(GitHubRepoRootId $id, TagName $name)
    {
        $id->serialize()->shouldBeCalled()->willReturn('R0hSZXBvUm9vdDoxMjM=');
        $name->serialize()->shouldBeCalled()->willReturn('0.1');
        $this->serialize()->shouldReturn(['id' => 'R0hSZXBvUm9vdDoxMjM=', 'name' => '0.1']);
    }

    public function it_can_be_deserialized()
    {
        $input = ['id' => 'R0hSZXBvUm9vdDoxMjM=', 'name' => '0.1'];

        $this->deserialize($input)->shouldReturnAnInstanceOf(DeleteGitHubTag::class);
    }
}
