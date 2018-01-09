<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubBuild\Domain\Event;

use DateTime;
use Devboard\GitHubBuild\Core\GitHubBuildId;
use Devboard\GitHubBuild\Domain\Event\GitHubBuildItemCreated;
use DevboardLib\Generix\GravatarId;
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
 * @covers \Devboard\GitHubBuild\Domain\Event\GitHubBuildItemCreated
 * @group  todo
 */
class GitHubBuildItemCreatedTest extends TestCase
{
    /** @var GitHubBuildId */
    private $buildId;

    /** @var GitHubStatus */
    private $status;

    /** @var DateTime */
    private $createdAt;

    /** @var GitHubBuildItemCreated */
    private $sut;

    public function setUp()
    {
        $this->buildId = new GitHubBuildId('R0hCdWlsZDoxMjM6MQ==');
        $this->status  = new GitHubStatus(
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
        $this->createdAt = new DateTime('2018-01-01T00:01:00+00:00');
        $this->sut       = new GitHubBuildItemCreated($this->buildId, $this->status, $this->createdAt);
    }

    public function testCreate()
    {
        $buildId = new GitHubBuildId('R0hCdWlsZDoxMjM6MQ==');
        $status  = new GitHubStatus(
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
        $result = $this->sut->create($buildId, $status);
        self::assertInstanceOf(GitHubBuildItemCreated::class, $result);
    }

    public function testGetBuildId()
    {
        self::assertSame($this->buildId, $this->sut->getBuildId());
    }

    public function testGetStatus()
    {
        self::assertSame($this->status, $this->sut->getStatus());
    }

    public function testGetCreatedAt()
    {
        self::assertSame($this->createdAt, $this->sut->getCreatedAt());
    }

    public function testSerialize()
    {
        $expected = [
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

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubBuildItemCreated::deserialize(json_decode($serialized, true)));
    }
}
