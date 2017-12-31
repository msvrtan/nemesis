<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\Branch\BranchProtectionUrl;
use DevboardLib\GitHub\GitHubBranch;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\Repo\RepoFullName;
use Git\Reference;
use PhpSpec\ObjectBehavior;

class GitHubBranchSpec extends ObjectBehavior
{
    public function let(RepoFullName $repoFullName, BranchName $name, GitHubCommit $commit, BranchProtectionUrl $protectionUrl)
    {
        $this->beConstructedWith($repoFullName, $name, $commit, $protected = false, $protectionUrl);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBranch::class);
        $this->shouldImplement(Reference::class);
    }

    public function it_exposes_repo_full_name(RepoFullName $repoFullName)
    {
        $this->getRepoFullName()->shouldReturn($repoFullName);
    }

    public function it_exposes_name(BranchName $name)
    {
        $this->getName()->shouldReturn($name);
    }

    public function it_exposes_commit(GitHubCommit $commit)
    {
        $this->getCommit()->shouldReturn($commit);
    }

    public function it_exposes_protected()
    {
        $this->getProtected()->shouldReturn(false);
    }

    public function it_exposes_protection_url(BranchProtectionUrl $protectionUrl)
    {
        $this->getProtectionUrl()->shouldReturn($protectionUrl);
    }

    public function it_can_be_serialized(RepoFullName $repoFullName, BranchName $name, GitHubCommit $commit, BranchProtectionUrl $protectionUrl)
    {
        $repoFullName->serialize()->shouldBeCalled()->willReturn(['owner' => 'value', 'repoName' => 'name']);
        $name->serialize()->shouldBeCalled()->willReturn('master');
        $commit->serialize()->shouldBeCalled()->willReturn(
            [
                'sha'        => 'sha',
                'message'    => 'message',
                'commitDate' => '2018-01-01T00:01:00+00:00',
                'author'     => [
                    'name'          => 'name',
                    'email'         => 'value',
                    'commitDate'    => '2018-01-01T00:01:00+00:00',
                    'authorDetails' => [
                        'userId'     => 1,
                        'login'      => 'value',
                        'type'       => 'type',
                        'avatarUrl'  => 'avatarUrl',
                        'gravatarId' => 'id',
                        'htmlUrl'    => 'htmlUrl',
                        'apiUrl'     => 'apiUrl',
                        'siteAdmin'  => true,
                    ],
                ],
                'committer' => [
                    'name'             => 'name',
                    'email'            => 'value',
                    'commitDate'       => '2018-01-01T00:01:00+00:00',
                    'committerDetails' => [
                        'userId'     => 1,
                        'login'      => 'value',
                        'type'       => 'type',
                        'avatarUrl'  => 'avatarUrl',
                        'gravatarId' => 'id',
                        'htmlUrl'    => 'htmlUrl',
                        'apiUrl'     => 'apiUrl',
                        'siteAdmin'  => true,
                    ],
                ],
                'tree'         => ['sha' => 'sha', 'apiUrl' => 'apiUrl'],
                'parents'      => [['sha' => 'sha', 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl']],
                'verification' => ['verified' => true, 'reason' => 'reason', 'signature' => 'signature', 'payload' => 'payload'],
                'apiUrl'       => 'apiUrl',
                'htmlUrl'      => 'htmlUrl',
            ]
        );
        $protectionUrl->serialize()->shouldBeCalled()->willReturn('protectionUrl');
        $this->serialize()->shouldReturn(
            [
                'repoFullName' => ['owner' => 'value', 'repoName' => 'name'],
                'name'         => 'master',
                'commit'       => [
                    'sha'        => 'sha',
                    'message'    => 'message',
                    'commitDate' => '2018-01-01T00:01:00+00:00',
                    'author'     => [
                        'name'          => 'name',
                        'email'         => 'value',
                        'commitDate'    => '2018-01-01T00:01:00+00:00',
                        'authorDetails' => [
                            'userId'     => 1,
                            'login'      => 'value',
                            'type'       => 'type',
                            'avatarUrl'  => 'avatarUrl',
                            'gravatarId' => 'id',
                            'htmlUrl'    => 'htmlUrl',
                            'apiUrl'     => 'apiUrl',
                            'siteAdmin'  => true,
                        ],
                    ],
                    'committer' => [
                        'name'             => 'name',
                        'email'            => 'value',
                        'commitDate'       => '2018-01-01T00:01:00+00:00',
                        'committerDetails' => [
                            'userId'     => 1,
                            'login'      => 'value',
                            'type'       => 'type',
                            'avatarUrl'  => 'avatarUrl',
                            'gravatarId' => 'id',
                            'htmlUrl'    => 'htmlUrl',
                            'apiUrl'     => 'apiUrl',
                            'siteAdmin'  => true,
                        ],
                    ],
                    'tree'         => ['sha' => 'sha', 'apiUrl' => 'apiUrl'],
                    'parents'      => [['sha' => 'sha', 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl']],
                    'verification' => ['verified' => true, 'reason' => 'reason', 'signature' => 'signature', 'payload' => 'payload'],
                    'apiUrl'       => 'apiUrl',
                    'htmlUrl'      => 'htmlUrl',
                ],
                'protected'     => false,
                'protectionUrl' => 'protectionUrl',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'repoFullName' => ['owner' => 'value', 'repoName' => 'name'],
            'name'         => 'master',
            'commit'       => [
                'sha'        => 'sha',
                'message'    => 'message',
                'commitDate' => '2018-01-01T00:01:00+00:00',
                'author'     => [
                    'name'          => 'name',
                    'email'         => 'value',
                    'commitDate'    => '2018-01-01T00:01:00+00:00',
                    'authorDetails' => [
                        'userId'     => 1,
                        'login'      => 'value',
                        'type'       => 'type',
                        'avatarUrl'  => 'avatarUrl',
                        'gravatarId' => 'id',
                        'htmlUrl'    => 'htmlUrl',
                        'apiUrl'     => 'apiUrl',
                        'siteAdmin'  => true,
                    ],
                ],
                'committer' => [
                    'name'             => 'name',
                    'email'            => 'value',
                    'commitDate'       => '2018-01-01T00:01:00+00:00',
                    'committerDetails' => [
                        'userId'     => 1,
                        'login'      => 'value',
                        'type'       => 'type',
                        'avatarUrl'  => 'avatarUrl',
                        'gravatarId' => 'id',
                        'htmlUrl'    => 'htmlUrl',
                        'apiUrl'     => 'apiUrl',
                        'siteAdmin'  => true,
                    ],
                ],
                'tree'         => ['sha' => 'sha', 'apiUrl' => 'apiUrl'],
                'parents'      => [['sha' => 'sha', 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl']],
                'verification' => ['verified' => true, 'reason' => 'reason', 'signature' => 'signature', 'payload' => 'payload'],
                'apiUrl'       => 'apiUrl',
                'htmlUrl'      => 'htmlUrl',
            ],
            'protected'     => false,
            'protectionUrl' => 'protectionUrl',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubBranch::class);
    }
}
