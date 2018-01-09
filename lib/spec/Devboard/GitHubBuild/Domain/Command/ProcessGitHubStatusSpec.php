<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubBuild\Domain\Command;

use Devboard\GitHubBuild\Core\GitHubBuildRootId;
use Devboard\GitHubBuild\Domain\Command\ProcessGitHubStatus;
use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\GitHubStatus;
use PhpSpec\ObjectBehavior;

class ProcessGitHubStatusSpec extends ObjectBehavior
{
    public function let(GitHubBuildRootId $gitHubBuildRootId, CommitSha $commitSha, GitHubStatus $status)
    {
        $this->beConstructedWith($gitHubBuildRootId, $commitSha, $status);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ProcessGitHubStatus::class);
    }

    public function it_exposes_git_hub_build_root_id(GitHubBuildRootId $gitHubBuildRootId)
    {
        $this->getGitHubBuildRootId()->shouldReturn($gitHubBuildRootId);
    }

    public function it_exposes_commit_sha(CommitSha $commitSha)
    {
        $this->getCommitSha()->shouldReturn($commitSha);
    }

    public function it_exposes_status(GitHubStatus $status)
    {
        $this->getStatus()->shouldReturn($status);
    }

    public function it_can_be_serialized(
        GitHubBuildRootId $gitHubBuildRootId, CommitSha $commitSha, GitHubStatus $status
    ) {
        $gitHubBuildRootId->serialize()->shouldBeCalled()->willReturn('R0hCdWlsZFJvb3Q6MTIz');
        $commitSha->serialize()->shouldBeCalled()->willReturn('e54c3c97b4024b4a9b270b62921c6b830d780bd3');
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
        $this->serialize()->shouldReturn(
            [
                'gitHubBuildRootId' => 'R0hCdWlsZFJvb3Q6MTIz',
                'commitSha'         => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
                'status'            => [
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
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'gitHubBuildRootId' => 'R0hCdWlsZFJvb3Q6MTIz',
            'commitSha'         => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
            'status'            => [
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
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(ProcessGitHubStatus::class);
    }
}
