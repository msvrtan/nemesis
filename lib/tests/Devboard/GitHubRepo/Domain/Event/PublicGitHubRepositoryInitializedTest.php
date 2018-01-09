<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubRepo\Domain\Event;

use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\Event\PublicGitHubRepositoryInitialized;
use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Repo\RepoCreatedAt;
use DevboardLib\GitHub\Repo\RepoDescription;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoHtmlUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrl;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoId;
use DevboardLib\GitHub\Repo\RepoName;
use DevboardLib\GitHub\Repo\RepoOwner;
use DevboardLib\GitHub\Repo\RepoParent;
use DevboardLib\GitHub\Repo\RepoPushedAt;
use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoStats\RepoSize;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use DevboardLib\GitHub\Repo\RepoUpdatedAt;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \Devboard\GitHubRepo\Domain\Event\PublicGitHubRepositoryInitialized
 * @group  todo
 */
class PublicGitHubRepositoryInitializedTest extends TestCase
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var RepoFullName */
    private $fullName;

    /** @var RepoOwner|null */
    private $owner;

    /** @var RepoDescription|null */
    private $description;

    /** @var RepoParent|null */
    private $parent;

    /** @var RepoEndpoints */
    private $endpoints;

    /** @var RepoTimestamps */
    private $timestamps;

    /** @var RepoStats */
    private $stats;

    /** @var DateTime */
    private $initializedAt;

    /** @var PublicGitHubRepositoryInitialized */
    private $sut;

    public function setUp()
    {
        $this->id       = new GitHubRepoRootId('R0hSZXBvUm9vdDoxMjM=');
        $this->fullName = new RepoFullName(new AccountLogin('value'), new RepoName('name'));
        $this->owner    = new RepoOwner(
            new AccountId(1),
            new AccountLogin('value'),
            new AccountType('type'),
            new AccountAvatarUrl('avatarUrl'),
            new GravatarId('205e460b479e2e5b48aec07710c08d50'),
            new AccountHtmlUrl('htmlUrl'),
            new AccountApiUrl('apiUrl'),
            true
        );
        $this->description = new RepoDescription('description');
        $this->parent      = new RepoParent(
            new RepoId(1), new RepoFullName(new AccountLogin('value'), new RepoName('name'))
        );
        $this->endpoints = new RepoEndpoints(
            new RepoHtmlUrl('htmlUrl'),
            new RepoApiUrl('apiUrl'),
            new RepoGitUrl('gitUrl'),
            new RepoSshUrl('sshUrl')
        );
        $this->timestamps = new RepoTimestamps(
            new RepoCreatedAt('2018-01-01T00:01:00+00:00'),
            new RepoUpdatedAt('2018-01-01T00:01:00+00:00'),
            new RepoPushedAt('2018-01-01T00:01:00+00:00')
        );
        $this->stats         = new RepoStats(1, 1, 1, 1, 1, new RepoSize(1));
        $this->initializedAt = new DateTime('2018-01-01T00:01:00+00:00');
        $this->sut           = new PublicGitHubRepositoryInitialized(
            $this->id,
            $this->fullName,
            $this->owner,
            $this->description,
            $this->parent,
            $this->endpoints,
            $this->timestamps,
            $this->stats,
            $this->initializedAt
        );
    }

    public function testCreate()
    {
        $id       = new GitHubRepoRootId('R0hSZXBvUm9vdDoxMjM=');
        $fullName = new RepoFullName(new AccountLogin('value'), new RepoName('name'));
        $owner    = new RepoOwner(
            new AccountId(1),
            new AccountLogin('value'),
            new AccountType('type'),
            new AccountAvatarUrl('avatarUrl'),
            new GravatarId('205e460b479e2e5b48aec07710c08d50'),
            new AccountHtmlUrl('htmlUrl'),
            new AccountApiUrl('apiUrl'),
            true
        );
        $description = new RepoDescription('description');
        $parent      = new RepoParent(new RepoId(1), new RepoFullName(new AccountLogin('value'), new RepoName('name')));
        $endpoints   = new RepoEndpoints(
            new RepoHtmlUrl('htmlUrl'),
            new RepoApiUrl('apiUrl'),
            new RepoGitUrl('gitUrl'),
            new RepoSshUrl('sshUrl')
        );
        $timestamps = new RepoTimestamps(
            new RepoCreatedAt('2018-01-01T00:01:00+00:00'),
            new RepoUpdatedAt('2018-01-01T00:01:00+00:00'),
            new RepoPushedAt('2018-01-01T00:01:00+00:00')
        );
        $stats  = new RepoStats(1, 1, 1, 1, 1, new RepoSize(1));
        $result = $this->sut->create($id, $fullName, $owner, $description, $parent, $endpoints, $timestamps, $stats);
        self::assertInstanceOf(PublicGitHubRepositoryInitialized::class, $result);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetFullName()
    {
        self::assertSame($this->fullName, $this->sut->getFullName());
    }

    public function testGetOwner()
    {
        self::assertSame($this->owner, $this->sut->getOwner());
    }

    public function testGetDescription()
    {
        self::assertSame($this->description, $this->sut->getDescription());
    }

    public function testGetParent()
    {
        self::assertSame($this->parent, $this->sut->getParent());
    }

    public function testGetEndpoints()
    {
        self::assertSame($this->endpoints, $this->sut->getEndpoints());
    }

    public function testGetTimestamps()
    {
        self::assertSame($this->timestamps, $this->sut->getTimestamps());
    }

    public function testGetStats()
    {
        self::assertSame($this->stats, $this->sut->getStats());
    }

    public function testGetInitializedAt()
    {
        self::assertSame($this->initializedAt, $this->sut->getInitializedAt());
    }

    public function testHasOwner()
    {
        self::assertTrue($this->sut->hasOwner());
    }

    public function testHasDescription()
    {
        self::assertTrue($this->sut->hasDescription());
    }

    public function testHasParent()
    {
        self::assertTrue($this->sut->hasParent());
    }

    public function testSerialize()
    {
        $expected = [
            'id'       => 'R0hSZXBvUm9vdDoxMjM=',
            'fullName' => ['owner' => 'value', 'repoName' => 'name'],
            'owner'    => [
                'userId'     => 1,
                'login'      => 'value',
                'type'       => 'type',
                'avatarUrl'  => 'avatarUrl',
                'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                'htmlUrl'    => 'htmlUrl',
                'apiUrl'     => 'apiUrl',
                'siteAdmin'  => true,
            ],
            'description' => 'description',
            'parent'      => ['id' => 1, 'fullName' => ['owner' => 'value', 'repoName' => 'name']],
            'endpoints'   => ['htmlUrl' => 'htmlUrl', 'apiUrl' => 'apiUrl', 'gitUrl' => 'gitUrl', 'sshUrl' => 'sshUrl'],
            'timestamps'  => [
                'createdAt' => '2018-01-01T00:01:00+00:00',
                'updatedAt' => '2018-01-01T00:01:00+00:00',
                'pushedAt'  => '2018-01-01T00:01:00+00:00',
            ],
            'stats' => [
                'networkCount'     => 1,
                'watchersCount'    => 1,
                'stargazersCount'  => 1,
                'subscribersCount' => 1,
                'openIssuesCount'  => 1,
                'size'             => 1,
            ],
            'initializedAt' => '2018-01-01T00:01:00+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, PublicGitHubRepositoryInitialized::deserialize(json_decode($serialized, true)));
    }
}
