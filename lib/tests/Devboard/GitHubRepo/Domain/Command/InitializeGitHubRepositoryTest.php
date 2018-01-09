<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubRepo\Domain\Command;

use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\Command\InitializeGitHubRepository;
use DevboardLib\Generix\GravatarId;
use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\GitHubRepo;
use DevboardLib\GitHub\Repo\RepoCreatedAt;
use DevboardLib\GitHub\Repo\RepoDescription;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoApiUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoGitUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoHtmlUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints\RepoSshUrl;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoHomepage;
use DevboardLib\GitHub\Repo\RepoId;
use DevboardLib\GitHub\Repo\RepoLanguage;
use DevboardLib\GitHub\Repo\RepoMirrorUrl;
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
 * @covers \Devboard\GitHubRepo\Domain\Command\InitializeGitHubRepository
 * @group  todo
 */
class InitializeGitHubRepositoryTest extends TestCase
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var GitHubRepo */
    private $repo;

    /** @var InitializeGitHubRepository */
    private $sut;

    public function setUp()
    {
        $this->id   = new GitHubRepoRootId('R0hSZXBvUm9vdDoxMjM=');
        $this->repo = new GitHubRepo(
            new RepoId(1),
            new RepoFullName(new AccountLogin('value'), new RepoName('name')),
            new RepoOwner(
                new AccountId(1),
                new AccountLogin('value'),
                new AccountType('type'),
                new AccountAvatarUrl('avatarUrl'),
                new GravatarId('205e460b479e2e5b48aec07710c08d50'),
                new AccountHtmlUrl('htmlUrl'),
                new AccountApiUrl('apiUrl'),
                true
            ),
            true,
            new BranchName('production'),
            true,
            new RepoParent(new RepoId(1), new RepoFullName(new AccountLogin('value'), new RepoName('name'))),
            new RepoDescription('description'),
            new RepoHomepage('homepage'),
            new RepoLanguage('language'),
            new RepoMirrorUrl('mirrorUrl'),
            true,
            new RepoEndpoints(
                new RepoHtmlUrl('htmlUrl'),
                new RepoApiUrl('apiUrl'),
                new RepoGitUrl('gitUrl'),
                new RepoSshUrl('sshUrl')
            ),
            new RepoStats(1, 1, 1, 1, 1, new RepoSize(1)),
            new RepoTimestamps(
                new RepoCreatedAt('2018-01-01T00:01:00+00:00'),
                new RepoUpdatedAt('2018-01-01T00:01:00+00:00'),
                new RepoPushedAt('2018-01-01T00:01:00+00:00')
            )
        );
        $this->sut = new InitializeGitHubRepository($this->id, $this->repo);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetRepo()
    {
        self::assertSame($this->repo, $this->sut->getRepo());
    }

    public function testSerialize()
    {
        $expected = [
            'id'   => 'R0hSZXBvUm9vdDoxMjM=',
            'repo' => [
                'id'       => 1,
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
                'private'       => true,
                'defaultBranch' => 'production',
                'fork'          => true,
                'parent'        => ['id' => 1, 'fullName' => ['owner' => 'value', 'repoName' => 'name']],
                'description'   => 'description',
                'homepage'      => 'homepage',
                'language'      => 'language',
                'mirrorUrl'     => 'mirrorUrl',
                'archived'      => true,
                'endpoints'     => [
                    'htmlUrl' => 'htmlUrl',
                    'apiUrl'  => 'apiUrl',
                    'gitUrl'  => 'gitUrl',
                    'sshUrl'  => 'sshUrl',
                ],
                'stats' => [
                    'networkCount'     => 1,
                    'watchersCount'    => 1,
                    'stargazersCount'  => 1,
                    'subscribersCount' => 1,
                    'openIssuesCount'  => 1,
                    'size'             => 1,
                ],
                'timestamps' => [
                    'createdAt' => '2018-01-01T00:01:00+00:00',
                    'updatedAt' => '2018-01-01T00:01:00+00:00',
                    'pushedAt'  => '2018-01-01T00:01:00+00:00',
                ],
            ],
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, InitializeGitHubRepository::deserialize(json_decode($serialized, true)));
    }
}
