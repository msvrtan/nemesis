<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Application\ApplicationId;
use DevboardLib\GitHub\GitHubInstallation;
use DevboardLib\GitHub\Installation\InstallationAccessTokenUrl;
use DevboardLib\GitHub\Installation\InstallationAccount;
use DevboardLib\GitHub\Installation\InstallationCreatedAt;
use DevboardLib\GitHub\Installation\InstallationEvents;
use DevboardLib\GitHub\Installation\InstallationHtmlUrl;
use DevboardLib\GitHub\Installation\InstallationId;
use DevboardLib\GitHub\Installation\InstallationPermissions;
use DevboardLib\GitHub\Installation\InstallationRepositoriesUrl;
use DevboardLib\GitHub\Installation\InstallationRepositorySelection;
use DevboardLib\GitHub\Installation\InstallationUpdatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubInstallation
 * @group  todo
 */
class GitHubInstallationTest extends TestCase
{
    /** @var InstallationId */
    private $installationId;

    /** @var InstallationAccount */
    private $installationAccount;

    /** @var ApplicationId */
    private $applicationId;

    /** @var InstallationRepositorySelection|null */
    private $repositorySelection;

    /** @var InstallationPermissions */
    private $permissions;

    /** @var InstallationEvents */
    private $events;

    /** @var InstallationAccessTokenUrl */
    private $accessTokenUrl;

    /** @var InstallationRepositoriesUrl */
    private $repositoriesUrl;

    /** @var InstallationHtmlUrl */
    private $htmlUrl;

    /** @var InstallationCreatedAt */
    private $createdAt;

    /** @var InstallationUpdatedAt */
    private $updatedAt;

    /** @var GitHubInstallation */
    private $sut;

    public function setUp()
    {
        $this->installationId      = new InstallationId(25235);
        $this->installationAccount = new InstallationAccount(
            new AccountId(1),
            new AccountLogin('value'),
            new AccountType('type'),
            new AccountAvatarUrl('avatarUrl'),
            new GravatarId('205e460b479e2e5b48aec07710c08d50'),
            new AccountHtmlUrl('htmlUrl'),
            new AccountApiUrl('apiUrl'),
            true
        );
        $this->applicationId       = new ApplicationId(177);
        $this->repositorySelection = new InstallationRepositorySelection('value');
        $this->permissions         = new InstallationPermissions(
            ['0' => 'some-installation-permission', '1' => 'another-installation-permission']
        );
        $this->events          = new InstallationEvents(['0' => 'some-installation-event', '1' => 'another-installation-event']);
        $this->accessTokenUrl  = new InstallationAccessTokenUrl('access-token-url');
        $this->repositoriesUrl = new InstallationRepositoriesUrl('installationRepositoriesUrl');
        $this->htmlUrl         = new InstallationHtmlUrl('installationHtmlUrl');
        $this->createdAt       = new InstallationCreatedAt('2016-08-02T17:35:14+00:00');
        $this->updatedAt       = new InstallationUpdatedAt('2016-08-03T11:31:05+00:00');
        $this->sut             = new GitHubInstallation(
            $this->installationId,
            $this->installationAccount,
            $this->applicationId,
            $this->repositorySelection,
            $this->permissions,
            $this->events,
            $this->accessTokenUrl,
            $this->repositoriesUrl,
            $this->htmlUrl,
            $this->createdAt,
            $this->updatedAt
        );
    }

    public function testGetInstallationId()
    {
        self::assertSame($this->installationId, $this->sut->getInstallationId());
    }

    public function testGetInstallationAccount()
    {
        self::assertSame($this->installationAccount, $this->sut->getInstallationAccount());
    }

    public function testGetApplicationId()
    {
        self::assertSame($this->applicationId, $this->sut->getApplicationId());
    }

    public function testGetRepositorySelection()
    {
        self::assertSame($this->repositorySelection, $this->sut->getRepositorySelection());
    }

    public function testGetPermissions()
    {
        self::assertSame($this->permissions, $this->sut->getPermissions());
    }

    public function testGetEvents()
    {
        self::assertSame($this->events, $this->sut->getEvents());
    }

    public function testGetAccessTokenUrl()
    {
        self::assertSame($this->accessTokenUrl, $this->sut->getAccessTokenUrl());
    }

    public function testGetRepositoriesUrl()
    {
        self::assertSame($this->repositoriesUrl, $this->sut->getRepositoriesUrl());
    }

    public function testGetHtmlUrl()
    {
        self::assertSame($this->htmlUrl, $this->sut->getHtmlUrl());
    }

    public function testGetCreatedAt()
    {
        self::assertSame($this->createdAt, $this->sut->getCreatedAt());
    }

    public function testGetUpdatedAt()
    {
        self::assertSame($this->updatedAt, $this->sut->getUpdatedAt());
    }

    public function testHasRepositorySelection()
    {
        self::assertTrue($this->sut->hasRepositorySelection());
    }

    public function testSerialize()
    {
        $expected = [
            'installationId'      => 25235,
            'installationAccount' => [
                'userId'     => 1,
                'login'      => 'value',
                'type'       => 'type',
                'avatarUrl'  => 'avatarUrl',
                'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                'htmlUrl'    => 'htmlUrl',
                'apiUrl'     => 'apiUrl',
                'siteAdmin'  => true,
            ],
            'applicationId'       => 177,
            'repositorySelection' => 'value',
            'permissions'         => ['0' => 'some-installation-permission', '1' => 'another-installation-permission'],
            'events'              => ['0' => 'some-installation-event', '1' => 'another-installation-event'],
            'accessTokenUrl'      => 'access-token-url',
            'repositoriesUrl'     => 'installationRepositoriesUrl',
            'htmlUrl'             => 'installationHtmlUrl',
            'createdAt'           => '2016-08-02T17:35:14+00:00',
            'updatedAt'           => '2016-08-03T11:31:05+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubInstallation::deserialize(json_decode($serialized, true)));
    }
}
