<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain\Event;

use Broadway\Serializer\Serializable;
use Carbon\Carbon;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\Repo\RepoId;

/**
 * @see \spec\Devboard\GitHubRepo\Domain\Event\GitHubBranchDeletedSpec
 * @see \Tests\Devboard\GitHubRepo\Domain\Event\GitHubBranchDeletedTest
 */
class GitHubBranchDeleted implements GitHubBranchEvent, Serializable
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var BranchName */
    private $name;

    /** @var DateTime */
    private $deletedAt;

    public function __construct(GitHubRepoRootId $id, BranchName $name, DateTime $deletedAt)
    {
        $this->id        = $id;
        $this->name      = $name;
        $this->deletedAt = $deletedAt;
    }

    public static function create(GitHubRepoRootId $id, BranchName $name): self
    {
        return new self($id, $name, Carbon::now());
    }

    public function getId(): GitHubRepoRootId
    {
        return $this->id;
    }

    public function getName(): BranchName
    {
        return $this->name;
    }

    public function getDeletedAt(): DateTime
    {
        return $this->deletedAt;
    }

    public function getRepoId(): RepoId
    {
        return $this->id->getRepoId();
    }

    public function serialize(): array
    {
        return [
            'id'        => $this->id->serialize(),
            'name'      => $this->name->serialize(),
            'deletedAt' => $this->deletedAt->format('c'),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            GitHubRepoRootId::deserialize($data['id']),
            BranchName::deserialize($data['name']),
            new DateTime($data['deletedAt'])
        );
    }
}
