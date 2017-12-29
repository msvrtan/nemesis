<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Commit\CommitTree;
use DevboardLib\GitHub\Commit\Tree\TreeApiUrl;
use PhpSpec\ObjectBehavior;

class CommitTreeSpec extends ObjectBehavior
{
    public function let(CommitSha $sha, TreeApiUrl $url)
    {
        $this->beConstructedWith($sha, $url);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitTree::class);
    }

    public function it_exposes_sha(CommitSha $sha)
    {
        $this->getSha()->shouldReturn($sha);
    }

    public function it_exposes_url(TreeApiUrl $url)
    {
        $this->getUrl()->shouldReturn($url);
    }

    public function it_can_be_serialized(CommitSha $sha, TreeApiUrl $url)
    {
        $sha->serialize()->shouldBeCalled()->willReturn('02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0');
        $url->serialize()->shouldBeCalled()->willReturn('https://api.github.com/repos/baxterthehacker/public-repo/git/trees/02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0');
        $this->serialize()->shouldReturn(
            [
                'sha' => '02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0',
                'url' => 'https://api.github.com/repos/baxterthehacker/public-repo/git/trees/02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0',
            ]
        );
    }

    public function it_can_be_deserialized(CommitSha $sha, TreeApiUrl $url)
    {
        $input = [
            'sha' => '02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0',
            'url' => 'https://api.github.com/repos/baxterthehacker/public-repo/git/trees/02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(CommitTree::class);
    }
}
