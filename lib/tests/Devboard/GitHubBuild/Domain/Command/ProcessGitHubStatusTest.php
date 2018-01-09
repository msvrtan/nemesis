<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubBuild\Domain\Command;

use DateTime;
use Devboard\GitHubBuild\Core\GitHubBuildRootId;
use Devboard\GitHubBuild\Domain\Command\ProcessGitHubStatus;
use DevboardLib\Generix\GravatarId;
use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\External\ExternalService;
use DevboardLib\GitHub\GitHubStatus;
use DevboardLib\GitHub\Status\StatusContext;
use DevboardLib\GitHub\Status\StatusCreator;
use DevboardLib\GitHub\Status\StatusDescription;
use DevboardLib\GitHub\Status\StatusId;
use DevboardLib\GitHub\Status\StatusState;
use DevboardLib\GitHub\Status\StatusTargetUrl;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \Devboard\GitHubBuild\Domain\Command\ProcessGitHubStatus
 * @group  todo
 */
class ProcessGitHubStatusTest extends TestCase
{
    /** @var GitHubBuildRootId */
    private $gitHubBuildRootId;

    /** @var CommitSha */
    private $commitSha;

    /** @var GitHubStatus */
    private $status;

    /** @var ProcessGitHubStatus */
    private $sut;

    public function setUp()
    {
        $this->gitHubBuildRootId = new GitHubBuildRootId('R0hCdWlsZFJvb3Q6MTIz');
        $this->commitSha         = new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3');
        $this->status            = new GitHubStatus(
            new StatusId(1),
            new StatusState('value'),
            new StatusDescription('value'),
            new StatusTargetUrl(
                'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link&utm_medium=referral&utm_source=github-build-link'
            ),
            new StatusContext('ci/circleci'),
            new ExternalService('value'),
            new StatusCreator(
                new AccountId(1),
                new AccountLogin('value'),
                new AccountType('type'),
                new AccountAvatarUrl('avatarUrl'),
                new GravatarId('205e460b479e2e5b48aec07710c08d50'),
                new AccountHtmlUrl('htmlUrl'),
                new AccountApiUrl('apiUrl'),
                true
            ),
            new DateTime('2018-01-01T00:01:00+00:00'),
            new DateTime('2018-01-01T00:01:00+00:00')
        );
        $this->sut = new ProcessGitHubStatus($this->gitHubBuildRootId, $this->commitSha, $this->status);
    }

    public function testGetGitHubBuildRootId()
    {
        self::assertSame($this->gitHubBuildRootId, $this->sut->getGitHubBuildRootId());
    }

    public function testGetCommitSha()
    {
        self::assertSame($this->commitSha, $this->sut->getCommitSha());
    }

    public function testGetStatus()
    {
        self::assertSame($this->status, $this->sut->getStatus());
    }

    public function testSerialize()
    {
        $expected = [
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

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, ProcessGitHubStatus::deserialize(json_decode($serialized, true)));
    }
}
