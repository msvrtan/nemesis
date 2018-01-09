<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Domain\Command;

use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\Command\ProcessGitHubBranch;
use DevboardLib\GitHub\GitHubBranch;
use PhpSpec\ObjectBehavior;

class ProcessGitHubBranchSpec extends ObjectBehavior
{
    public function let(GitHubRepoRootId $id, GitHubBranch $branch)
    {
        $this->beConstructedWith($id, $branch);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ProcessGitHubBranch::class);
    }

    public function it_exposes_id(GitHubRepoRootId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_branch(GitHubBranch $branch)
    {
        $this->getBranch()->shouldReturn($branch);
    }

    public function it_can_be_serialized(GitHubRepoRootId $id, GitHubBranch $branch)
    {
        $id->serialize()->shouldBeCalled()->willReturn('R0hSZXBvUm9vdDoxMjM=');
        $branch->serialize()->shouldBeCalled()->willReturn(
            [
                'repoFullName' => ['owner' => 'value', 'repoName' => 'name'],
                'name'         => 'production',
                'commit'       => [
                    'sha'        => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                    'message'    => 'A commit message',
                    'commitDate' => '2018-01-02T11:12:13+00:00',
                    'author'     => [
                        'name'          => 'Amy Johnson',
                        'email'         => 'amy@example.com',
                        'commitDate'    => '2018-01-02T11:12:13+00:00',
                        'authorDetails' => [
                            'userId'     => 1,
                            'login'      => 'value',
                            'type'       => 'type',
                            'avatarUrl'  => 'avatarUrl',
                            'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                            'htmlUrl'    => 'htmlUrl',
                            'apiUrl'     => 'apiUrl',
                            'siteAdmin'  => true,
                        ],
                    ],
                    'committer' => [
                        'name'             => 'Amy Johnson',
                        'email'            => 'amy@example.com',
                        'commitDate'       => '2018-01-02T11:12:13+00:00',
                        'committerDetails' => [
                            'userId'     => 1,
                            'login'      => 'value',
                            'type'       => 'type',
                            'avatarUrl'  => 'avatarUrl',
                            'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                            'htmlUrl'    => 'htmlUrl',
                            'apiUrl'     => 'apiUrl',
                            'siteAdmin'  => true,
                        ],
                    ],
                    'tree'    => ['sha' => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3', 'apiUrl' => 'apiUrl'],
                    'parents' => [
                        [
                            'sha'     => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                            'apiUrl'  => 'apiUrl',
                            'htmlUrl' => 'htmlUrl',
                        ],
                    ],
                    'verification' => [
                        'verified'  => true,
                        'reason'    => 'reason',
                        'signature' => 'signature',
                        'payload'   => 'payload',
                    ],
                    'apiUrl'  => 'apiUrl',
                    'htmlUrl' => 'htmlUrl',
                ],
                'protected'     => true,
                'protectionUrl' => 'protectionUrl',
            ]
        );
        $this->serialize()->shouldReturn(
            [
                'id'     => 'R0hSZXBvUm9vdDoxMjM=',
                'branch' => [
                    'repoFullName' => ['owner' => 'value', 'repoName' => 'name'],
                    'name'         => 'production',
                    'commit'       => [
                        'sha'        => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                        'message'    => 'A commit message',
                        'commitDate' => '2018-01-02T11:12:13+00:00',
                        'author'     => [
                            'name'          => 'Amy Johnson',
                            'email'         => 'amy@example.com',
                            'commitDate'    => '2018-01-02T11:12:13+00:00',
                            'authorDetails' => [
                                'userId'     => 1,
                                'login'      => 'value',
                                'type'       => 'type',
                                'avatarUrl'  => 'avatarUrl',
                                'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                                'htmlUrl'    => 'htmlUrl',
                                'apiUrl'     => 'apiUrl',
                                'siteAdmin'  => true,
                            ],
                        ],
                        'committer' => [
                            'name'             => 'Amy Johnson',
                            'email'            => 'amy@example.com',
                            'commitDate'       => '2018-01-02T11:12:13+00:00',
                            'committerDetails' => [
                                'userId'     => 1,
                                'login'      => 'value',
                                'type'       => 'type',
                                'avatarUrl'  => 'avatarUrl',
                                'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                                'htmlUrl'    => 'htmlUrl',
                                'apiUrl'     => 'apiUrl',
                                'siteAdmin'  => true,
                            ],
                        ],
                        'tree'    => ['sha' => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3', 'apiUrl' => 'apiUrl'],
                        'parents' => [
                            [
                                'sha'     => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                                'apiUrl'  => 'apiUrl',
                                'htmlUrl' => 'htmlUrl',
                            ],
                        ],
                        'verification' => [
                            'verified'  => true,
                            'reason'    => 'reason',
                            'signature' => 'signature',
                            'payload'   => 'payload',
                        ],
                        'apiUrl'  => 'apiUrl',
                        'htmlUrl' => 'htmlUrl',
                    ],
                    'protected'     => true,
                    'protectionUrl' => 'protectionUrl',
                ],
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'id'     => 'R0hSZXBvUm9vdDoxMjM=',
            'branch' => [
                'repoFullName' => ['owner' => 'value', 'repoName' => 'name'],
                'name'         => 'production',
                'commit'       => [
                    'sha'        => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                    'message'    => 'A commit message',
                    'commitDate' => '2018-01-02T11:12:13+00:00',
                    'author'     => [
                        'name'          => 'Amy Johnson',
                        'email'         => 'amy@example.com',
                        'commitDate'    => '2018-01-02T11:12:13+00:00',
                        'authorDetails' => [
                            'userId'     => 1,
                            'login'      => 'value',
                            'type'       => 'type',
                            'avatarUrl'  => 'avatarUrl',
                            'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                            'htmlUrl'    => 'htmlUrl',
                            'apiUrl'     => 'apiUrl',
                            'siteAdmin'  => true,
                        ],
                    ],
                    'committer' => [
                        'name'             => 'Amy Johnson',
                        'email'            => 'amy@example.com',
                        'commitDate'       => '2018-01-02T11:12:13+00:00',
                        'committerDetails' => [
                            'userId'     => 1,
                            'login'      => 'value',
                            'type'       => 'type',
                            'avatarUrl'  => 'avatarUrl',
                            'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                            'htmlUrl'    => 'htmlUrl',
                            'apiUrl'     => 'apiUrl',
                            'siteAdmin'  => true,
                        ],
                    ],
                    'tree'    => ['sha' => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3', 'apiUrl' => 'apiUrl'],
                    'parents' => [
                        [
                            'sha'     => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                            'apiUrl'  => 'apiUrl',
                            'htmlUrl' => 'htmlUrl',
                        ],
                    ],
                    'verification' => [
                        'verified'  => true,
                        'reason'    => 'reason',
                        'signature' => 'signature',
                        'payload'   => 'payload',
                    ],
                    'apiUrl'  => 'apiUrl',
                    'htmlUrl' => 'htmlUrl',
                ],
                'protected'     => true,
                'protectionUrl' => 'protectionUrl',
            ],
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(ProcessGitHubBranch::class);
    }
}
