<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Domain\Event;

use Broadway\Serializer\Serializable;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\Event\GitHubTagEvent;
use Devboard\GitHubRepo\Domain\Event\GitHubTagUpdated;
use DevboardLib\Git\Tag\TagName;
use DevboardLib\GitHub\GitHubCommit;
use PhpSpec\ObjectBehavior;

class GitHubTagUpdatedSpec extends ObjectBehavior
{
    public function let(GitHubRepoRootId $id, TagName $name, GitHubCommit $commit, DateTime $updatedAt)
    {
        $this->beConstructedWith($id, $name, $commit, $updatedAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubTagUpdated::class);
        $this->shouldImplement(GitHubTagEvent::class);
        $this->shouldImplement(Serializable::class);
    }

    public function it_has_a_helper_factory_method(GitHubRepoRootId $id, TagName $name, GitHubCommit $commit)
    {
        $this->create($id, $name, $commit)->shouldReturnAnInstanceOf(GitHubTagUpdated::class);
    }

    public function it_exposes_id(GitHubRepoRootId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_name(TagName $name)
    {
        $this->getName()->shouldReturn($name);
    }

    public function it_exposes_commit(GitHubCommit $commit)
    {
        $this->getCommit()->shouldReturn($commit);
    }

    public function it_exposes_updated_at(DateTime $updatedAt)
    {
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }

    public function it_can_be_serialized(
        GitHubRepoRootId $id, TagName $name, GitHubCommit $commit, DateTime $updatedAt
    ) {
        $id->serialize()->shouldBeCalled()->willReturn('R0hSZXBvUm9vdDoxMjM=');
        $name->serialize()->shouldBeCalled()->willReturn('0.1');
        $commit->serialize()->shouldBeCalled()->willReturn(
            [
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
                    ['sha' => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3', 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl'],
                ],
                'verification' => [
                    'verified'  => true,
                    'reason'    => 'reason',
                    'signature' => 'signature',
                    'payload'   => 'payload',
                ],
                'apiUrl'  => 'apiUrl',
                'htmlUrl' => 'htmlUrl',
            ]
        );
        $updatedAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn(
            [
                'id'     => 'R0hSZXBvUm9vdDoxMjM=',
                'name'   => '0.1',
                'commit' => [
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
                'updatedAt' => '2018-01-01T00:01:00+00:00',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'id'     => 'R0hSZXBvUm9vdDoxMjM=',
            'name'   => '0.1',
            'commit' => [
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
                    ['sha' => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3', 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl'],
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
            'updatedAt' => '2018-01-01T00:01:00+00:00',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubTagUpdated::class);
    }
}
