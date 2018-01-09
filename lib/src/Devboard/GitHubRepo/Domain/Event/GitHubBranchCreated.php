<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain\Event;

use Broadway\Serializer\Serializable;
use Carbon\Carbon;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\GitHubBranch;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\Repo\RepoId;

/**
 * @see \spec\Devboard\GitHubRepo\Domain\Event\GitHubBranchCreatedSpec
 * @see \Tests\Devboard\GitHubRepo\Domain\Event\GitHubBranchCreatedTest
 */
class GitHubBranchCreated implements GitHubBranchEvent, Serializable
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var GitHubBranch */
    private $branch;

    /** @var DateTime */
    private $createdAt;

    public function __construct(GitHubRepoRootId $id, GitHubBranch $branch, DateTime $createdAt)
    {
        $this->id        = $id;
        $this->branch    = $branch;
        $this->createdAt = $createdAt;
    }

    public static function create(GitHubRepoRootId $id, GitHubBranch $branch): self
    {
        return new self($id, $branch, Carbon::now());
    }

    public function getId(): GitHubRepoRootId
    {
        return $this->id;
    }

    public function getBranch(): GitHubBranch
    {
        return $this->branch;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getRepoId(): RepoId
    {
        return $this->id->getRepoId();
    }

    public function getName(): BranchName
    {
        return $this->branch->getName();
    }

    public function getCommit(): GitHubCommit
    {
        return $this->branch->getCommit();
    }

    public function serialize(): array
    {
        return [
            'id'        => $this->id->serialize(),
            'branch'    => $this->branch->serialize(),
            'createdAt' => $this->createdAt->format('c'),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            GitHubRepoRootId::deserialize($data['id']),
            GitHubBranch::deserialize($data['branch']),
            new DateTime($data['createdAt'])
        );
    }
}
