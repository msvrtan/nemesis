<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Domain;

use Broadway\EventSourcing\SimpleEventSourcedEntity;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\GitHubBranchEntity;
use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\GitHubCommit;
use PhpSpec\ObjectBehavior;

class GitHubBranchEntitySpec extends ObjectBehavior
{
    public function let(
        GitHubRepoRootId $id, BranchName $name, GitHubCommit $commit, DateTime $createdAt, DateTime $updatedAt
    ) {
        $this->beConstructedWith($id, $name, $commit, $createdAt, $updatedAt, $deleted = false);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBranchEntity::class);
        $this->shouldHaveType(SimpleEventSourcedEntity::class);
    }

    public function it_exposes_name(BranchName $name)
    {
        $this->getName()->shouldReturn($name);
    }
}
