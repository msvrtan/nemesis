<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\Generix\GravatarId;
use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\GitHubRepo;
use DevboardLib\GitHub\GitHubRepoCollection;
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
 * @covers \DevboardLib\GitHub\GitHubRepoCollection
 * @group  todo
 */
class GitHubRepoCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var GitHubRepoCollection */
    private $sut;

    public function setUp()
    {
        $this->elements = [
            new GitHubRepo(
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
            ),
        ];
        $this->sut = new GitHubRepoCollection($this->elements);
    }

    public function testGetElements()
    {
        self::assertSame($this->elements, $this->sut->toArray());
    }

    public function testSerializeAndDeserialize()
    {
        $serialized     = $this->sut->serialize();
        $serializedJson = json_encode($serialized);
        self::assertEquals($this->sut, $this->sut->deserialize(json_decode($serializedJson, true)));
    }
}
