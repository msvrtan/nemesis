<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Domain;

use Devboard\GitHubRepo\Domain\GitHubBranchCollection;
use Devboard\GitHubRepo\Domain\GitHubBranchEntity;
use DevboardLib\Git\Branch\BranchName;
use PhpSpec\ObjectBehavior;

class GitHubBranchCollectionSpec extends ObjectBehavior
{
    public function let(GitHubBranchEntity $gitHubBranchEntity)
    {
        $this->beConstructedWith($elements = [$gitHubBranchEntity]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBranchCollection::class);
    }

    public function it_exposes_elements(GitHubBranchEntity $gitHubBranchEntity)
    {
        $this->toArray()->shouldReturn([$gitHubBranchEntity]);
    }

    public function it_exposes_number_of_elements_in_collection()
    {
        $this->count()->shouldReturn(1);
    }

    public function it_supports_add_new_element(GitHubBranchEntity $anotherGitHubBranchEntity)
    {
        $this->add($anotherGitHubBranchEntity);
        $this->count()->shouldReturn(2);
    }

    public function it_knows_if_element_is_in_collection(
        GitHubBranchEntity $gitHubBranchEntity, BranchName $branchName
    ) {
        $gitHubBranchEntity->getName()->shouldBeCalled()->willReturn($branchName);
        $this->has($branchName)->shouldReturn(true);
    }

    public function it_can_return_element_from_collection_by_given_id(
        GitHubBranchEntity $gitHubBranchEntity, BranchName $branchName
    ) {
        $gitHubBranchEntity->getName()->shouldBeCalled()->willReturn($branchName);
        $this->get($branchName)->shouldReturn($gitHubBranchEntity);
    }
}
