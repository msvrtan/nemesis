<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubBuild\Domain\Event;

use Broadway\Serializer\Serializable;
use DateTime;
use Devboard\GitHubBuild\Core\GitHubBuildId;
use Devboard\GitHubBuild\Domain\Event\GitHubBuildEvent;
use Devboard\GitHubBuild\Domain\Event\GitHubBuildItemError;
use Devboard\GitHubBuild\Domain\Event\GitHubBuildItemEvent;
use DevboardLib\GitHub\GitHubStatus;
use PhpSpec\ObjectBehavior;

class GitHubBuildItemErrorSpec extends ObjectBehavior
{
    public function let(GitHubBuildId $buildId, GitHubStatus $status, DateTime $createdAt)
    {
        $this->beConstructedWith($buildId, $status, $createdAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBuildItemError::class);
        $this->shouldImplement(GitHubBuildEvent::class);
        $this->shouldImplement(GitHubBuildItemEvent::class);
        $this->shouldImplement(Serializable::class);
    }

    public function it_has_a_helper_factory_method(GitHubBuildId $buildId, GitHubStatus $status)
    {
        $this->create($buildId, $status)->shouldReturnAnInstanceOf(GitHubBuildItemError::class);
    }

    public function it_exposes_build_id(GitHubBuildId $buildId)
    {
        $this->getBuildId()->shouldReturn($buildId);
    }

    public function it_exposes_status(GitHubStatus $status)
    {
        $this->getStatus()->shouldReturn($status);
    }

    public function it_exposes_created_at(DateTime $createdAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
    }

    public function it_can_be_serialized(GitHubBuildId $buildId, GitHubStatus $status, DateTime $createdAt)
    {
        $buildId->serialize()->shouldBeCalled()->willReturn('R0hCdWlsZDoxMjM6MQ==');
        $status->serialize()->shouldBeCalled()->willReturn(
            [
                'id'              => 1,
                'state'           => 'value',
                'description'     => 'value',
                'targetUrl'       => 'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link&utm_medium=referral&utm_source=github-build-link',
                'context'         => 'ci/circleci',
                'externalService' => 'value',
                'creator'         => [
                    'userId'     => 1,
                    'login'      => 'value',
                    'type'       => 'type',
                    'avatarUrl'  => 'avatarUrl',
                    'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                    'htmlUrl'    => 'htmlUrl',
                    'apiUrl'     => 'apiUrl',
                    'siteAdmin'  => true,
                ],
                'createdAt' => '2018-01-01T00:01:00+00:00',
                'updatedAt' => '2018-01-01T00:01:00+00:00',
            ]
        );
        $createdAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn(
            [
                'buildId' => 'R0hCdWlsZDoxMjM6MQ==',
                'status'  => [
                    'id'              => 1,
                    'state'           => 'value',
                    'description'     => 'value',
                    'targetUrl'       => 'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link&utm_medium=referral&utm_source=github-build-link',
                    'context'         => 'ci/circleci',
                    'externalService' => 'value',
                    'creator'         => [
                        'userId'     => 1,
                        'login'      => 'value',
                        'type'       => 'type',
                        'avatarUrl'  => 'avatarUrl',
                        'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                        'htmlUrl'    => 'htmlUrl',
                        'apiUrl'     => 'apiUrl',
                        'siteAdmin'  => true,
                    ],
                    'createdAt' => '2018-01-01T00:01:00+00:00',
                    'updatedAt' => '2018-01-01T00:01:00+00:00',
                ],
                'createdAt' => '2018-01-01T00:01:00+00:00',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'buildId' => 'R0hCdWlsZDoxMjM6MQ==',
            'status'  => [
                'id'              => 1,
                'state'           => 'value',
                'description'     => 'value',
                'targetUrl'       => 'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link&utm_medium=referral&utm_source=github-build-link',
                'context'         => 'ci/circleci',
                'externalService' => 'value',
                'creator'         => [
                    'userId'     => 1,
                    'login'      => 'value',
                    'type'       => 'type',
                    'avatarUrl'  => 'avatarUrl',
                    'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                    'htmlUrl'    => 'htmlUrl',
                    'apiUrl'     => 'apiUrl',
                    'siteAdmin'  => true,
                ],
                'createdAt' => '2018-01-01T00:01:00+00:00',
                'updatedAt' => '2018-01-01T00:01:00+00:00',
            ],
            'createdAt' => '2018-01-01T00:01:00+00:00',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubBuildItemError::class);
    }
}
