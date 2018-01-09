<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Repo\RepoDescription;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoName;
use DevboardLib\GitHub\Repo\RepoOwner;
use DevboardLib\GitHub\Repo\RepoParent;
use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoTimestamps;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 *
 * @see \spec\Devboard\GitHubRepo\Domain\GitHubRepoModelSpec
 * @see \Tests\Devboard\GitHubRepo\Domain\GitHubRepoModelTest
 */
class GitHubRepoModel extends EventSourcedAggregateRoot
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

    public function __construct()
    {
    }

    public function getAggregateRootId(): string
    {
        return $this->id->__toString();
    }
}
