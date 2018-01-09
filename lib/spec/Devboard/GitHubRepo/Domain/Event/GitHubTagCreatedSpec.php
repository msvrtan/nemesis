<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Domain\Event;

use Broadway\Serializer\Serializable;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\Event\GitHubTagCreated;
use Devboard\GitHubRepo\Domain\Event\GitHubTagEvent;
use DevboardLib\GitHub\GitHubTag;
use PhpSpec\ObjectBehavior;

class GitHubTagCreatedSpec extends ObjectBehavior
{
    public function let(GitHubRepoRootId $id, GitHubTag $tag, DateTime $createdAt)
    {
        $this->beConstructedWith($id, $tag, $createdAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubTagCreated::class);
        $this->shouldImplement(GitHubTagEvent::class);
        $this->shouldImplement(Serializable::class);
    }

    public function it_has_a_helper_factory_method(GitHubRepoRootId $id, GitHubTag $tag)
    {
        $this->create($id, $tag)->shouldReturnAnInstanceOf(GitHubTagCreated::class);
    }

    public function it_exposes_id(GitHubRepoRootId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_tag(GitHubTag $tag)
    {
        $this->getTag()->shouldReturn($tag);
    }

    public function it_exposes_created_at(DateTime $createdAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
    }

    public function it_can_be_serialized(GitHubRepoRootId $id, GitHubTag $tag, DateTime $createdAt)
    {
        $id->serialize()->shouldBeCalled()->willReturn('R0hSZXBvUm9vdDoxMjM=');
        $tag->serialize()->shouldBeCalled()->willReturn(
            [
                'repoFullName' => ['owner' => 'value', 'repoName' => 'name'],
                'name'         => '3.x',
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
            ]
        );
        $createdAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn(
            [
                'id'  => 'R0hSZXBvUm9vdDoxMjM=',
                'tag' => [
                    'repoFullName' => ['owner' => 'value', 'repoName' => 'name'],
                    'name'         => '3.x',
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
                ],
                'createdAt' => '2018-01-01T00:01:00+00:00',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'id'  => 'R0hSZXBvUm9vdDoxMjM=',
            'tag' => [
                'repoFullName' => ['owner' => 'value', 'repoName' => 'name'],
                'name'         => '3.x',
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
            ],
            'createdAt' => '2018-01-01T00:01:00+00:00',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubTagCreated::class);
    }
}
