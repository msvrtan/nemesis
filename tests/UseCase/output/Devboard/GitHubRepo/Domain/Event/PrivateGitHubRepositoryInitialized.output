<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain\Event;

use Broadway\Serializer\Serializable;
use Carbon\Carbon;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use DevboardLib\GitHub\Repo\RepoDescription;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoOwner;
use DevboardLib\GitHub\Repo\RepoParent;
use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoTimestamps;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 *
 * @see \spec\Devboard\GitHubRepo\Domain\Event\PrivateGitHubRepositoryInitializedSpec
 * @see \Tests\Devboard\GitHubRepo\Domain\Event\PrivateGitHubRepositoryInitializedTest
 */
class PrivateGitHubRepositoryInitialized implements Serializable
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

    public function __construct(
        GitHubRepoRootId $id,
        RepoFullName $fullName,
        ?RepoOwner $owner,
        ?RepoDescription $description,
        ?RepoParent $parent,
        RepoEndpoints $endpoints,
        RepoTimestamps $timestamps,
        RepoStats $stats,
        DateTime $initializedAt
    ) {
        $this->id            = $id;
        $this->fullName      = $fullName;
        $this->owner         = $owner;
        $this->description   = $description;
        $this->parent        = $parent;
        $this->endpoints     = $endpoints;
        $this->timestamps    = $timestamps;
        $this->stats         = $stats;
        $this->initializedAt = $initializedAt;
    }

    public static function create(
        GitHubRepoRootId $id,
        RepoFullName $fullName,
        ?RepoOwner $owner,
        ?RepoDescription $description,
        ?RepoParent $parent,
        RepoEndpoints $endpoints,
        RepoTimestamps $timestamps,
        RepoStats $stats
    ): self {
        return new self($id, $fullName, $owner, $description, $parent, $endpoints, $timestamps, $stats, Carbon::now());
    }

    public function getId(): GitHubRepoRootId
    {
        return $this->id;
    }

    public function getFullName(): RepoFullName
    {
        return $this->fullName;
    }

    public function getOwner(): ?RepoOwner
    {
        return $this->owner;
    }

    public function getDescription(): ?RepoDescription
    {
        return $this->description;
    }

    public function getParent(): ?RepoParent
    {
        return $this->parent;
    }

    public function getEndpoints(): RepoEndpoints
    {
        return $this->endpoints;
    }

    public function getTimestamps(): RepoTimestamps
    {
        return $this->timestamps;
    }

    public function getStats(): RepoStats
    {
        return $this->stats;
    }

    public function getInitializedAt(): DateTime
    {
        return $this->initializedAt;
    }

    public function hasOwner(): bool
    {
        if (null === $this->owner) {
            return false;
        }

        return true;
    }

    public function hasDescription(): bool
    {
        if (null === $this->description) {
            return false;
        }

        return true;
    }

    public function hasParent(): bool
    {
        if (null === $this->parent) {
            return false;
        }

        return true;
    }

    public function serialize(): array
    {
        if (null === $this->owner) {
            $owner = null;
        } else {
            $owner = $this->owner->serialize();
        }

        if (null === $this->description) {
            $description = null;
        } else {
            $description = $this->description->serialize();
        }

        if (null === $this->parent) {
            $parent = null;
        } else {
            $parent = $this->parent->serialize();
        }

        return [
            'id'            => $this->id->serialize(),
            'fullName'      => $this->fullName->serialize(),
            'owner'         => $owner,
            'description'   => $description,
            'parent'        => $parent,
            'endpoints'     => $this->endpoints->serialize(),
            'timestamps'    => $this->timestamps->serialize(),
            'stats'         => $this->stats->serialize(),
            'initializedAt' => $this->initializedAt->format('c'),
        ];
    }

    public static function deserialize(array $data): self
    {
        if (null === $data['owner']) {
            $owner = null;
        } else {
            $owner = RepoOwner::deserialize($data['owner']);
        }

        if (null === $data['description']) {
            $description = null;
        } else {
            $description = RepoDescription::deserialize($data['description']);
        }

        if (null === $data['parent']) {
            $parent = null;
        } else {
            $parent = RepoParent::deserialize($data['parent']);
        }

        return new self(
            GitHubRepoRootId::deserialize($data['id']),
            RepoFullName::deserialize($data['fullName']),
            $owner,
            $description,
            $parent,
            RepoEndpoints::deserialize($data['endpoints']),
            RepoTimestamps::deserialize($data['timestamps']),
            RepoStats::deserialize($data['stats']),
            new DateTime($data['initializedAt'])
        );
    }
}
