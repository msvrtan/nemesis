<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Domain;

use Broadway\EventSourcing\SimpleEventSourcedEntity;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\GitHubTagEntity;
use DevboardLib\Git\Tag\TagName;
use DevboardLib\GitHub\GitHubCommit;
use PhpSpec\ObjectBehavior;

class GitHubTagEntitySpec extends ObjectBehavior
{
    public function let(
        GitHubRepoRootId $id, TagName $name, GitHubCommit $commit, DateTime $createdAt, DateTime $updatedAt
    ) {
        $this->beConstructedWith($id, $name, $commit, $createdAt, $updatedAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubTagEntity::class);
        $this->shouldHaveType(SimpleEventSourcedEntity::class);
    }

    public function it_exposes_name(TagName $name)
    {
        $this->getName()->shouldReturn($name);
    }
}
