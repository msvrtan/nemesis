<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubRepo\Domain;

use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\GitHubRepoModel;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Repo\RepoDescription;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoName;
use DevboardLib\GitHub\Repo\RepoOwner;
use DevboardLib\GitHub\Repo\RepoParent;
use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \Devboard\GitHubRepo\Domain\GitHubRepoModel
 * @group  todo
 */
class GitHubRepoModelTest extends TestCase
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var AccountLogin */
    private $login;

    /** @var RepoName */
    private $name;

    /** @var bool */
    private $private;

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

    /** @var GitHubRepoModel */
    private $sut;

    public function setUp()
    {
        $this->sut = new GitHubRepoModel();
    }

    public function testGetAggregateRootId()
    {
        self::assertSame($this->id, $this->sut->getAggregateRootId());
    }
}
