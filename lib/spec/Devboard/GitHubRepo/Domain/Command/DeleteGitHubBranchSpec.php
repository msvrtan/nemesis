<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Domain\Command;

use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\Command\DeleteGitHubBranch;
use DevboardLib\Git\Branch\BranchName;
use PhpSpec\ObjectBehavior;

class DeleteGitHubBranchSpec extends ObjectBehavior
{
    public function let(GitHubRepoRootId $id, BranchName $name)
    {
        $this->beConstructedWith($id, $name);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DeleteGitHubBranch::class);
    }

    public function it_exposes_id(GitHubRepoRootId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_name(BranchName $name)
    {
        $this->getName()->shouldReturn($name);
    }

    public function it_can_be_serialized(GitHubRepoRootId $id, BranchName $name)
    {
        $id->serialize()->shouldBeCalled()->willReturn('R0hSZXBvUm9vdDoxMjM=');
        $name->serialize()->shouldBeCalled()->willReturn('master');
        $this->serialize()->shouldReturn(['id' => 'R0hSZXBvUm9vdDoxMjM=', 'name' => 'master']);
    }

    public function it_can_be_deserialized()
    {
        $input = ['id' => 'R0hSZXBvUm9vdDoxMjM=', 'name' => 'master'];

        $this->deserialize($input)->shouldReturnAnInstanceOf(DeleteGitHubBranch::class);
    }
}
