<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Domain;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Devboard\GitHubRepo\Domain\GitHubRepoModel;
use PhpSpec\ObjectBehavior;

class GitHubRepoModelSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoModel::class);
        $this->shouldHaveType(EventSourcedAggregateRoot::class);
    }

    public function it_exposes_aggregate_root_id()
    {
        $this->getAggregateRootId()->shouldReturn('id');
    }
}
