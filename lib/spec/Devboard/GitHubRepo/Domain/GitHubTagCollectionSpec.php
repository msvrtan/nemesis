<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Domain;

use Devboard\GitHubRepo\Domain\GitHubTagCollection;
use Devboard\GitHubRepo\Domain\GitHubTagEntity;
use DevboardLib\Git\Tag\TagName;
use PhpSpec\ObjectBehavior;

class GitHubTagCollectionSpec extends ObjectBehavior
{
    public function let(GitHubTagEntity $gitHubTagEntity)
    {
        $this->beConstructedWith($elements = [$gitHubTagEntity]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubTagCollection::class);
    }

    public function it_exposes_elements(GitHubTagEntity $gitHubTagEntity)
    {
        $this->toArray()->shouldReturn([$gitHubTagEntity]);
    }

    public function it_exposes_number_of_elements_in_collection()
    {
        $this->count()->shouldReturn(1);
    }

    public function it_supports_add_new_element(GitHubTagEntity $anotherGitHubTagEntity)
    {
        $this->add($anotherGitHubTagEntity);
        $this->count()->shouldReturn(2);
    }

    public function it_knows_if_element_is_in_collection(GitHubTagEntity $gitHubTagEntity, TagName $tagName)
    {
        $gitHubTagEntity->getName()->shouldBeCalled()->willReturn($tagName);
        $this->has($tagName)->shouldReturn(true);
    }

    public function it_can_return_element_from_collection_by_given_id(
        GitHubTagEntity $gitHubTagEntity, TagName $tagName
    ) {
        $gitHubTagEntity->getName()->shouldBeCalled()->willReturn($tagName);
        $this->get($tagName)->shouldReturn($gitHubTagEntity);
    }
}
