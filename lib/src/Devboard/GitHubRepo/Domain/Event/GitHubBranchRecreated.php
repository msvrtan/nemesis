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
 * @see \spec\Devboard\GitHubRepo\Domain\Event\GitHubBranchRecreatedSpec
 * @see \Tests\Devboard\GitHubRepo\Domain\Event\GitHubBranchRecreatedTest
 */
class GitHubBranchRecreated implements GitHubBranchEvent, Serializable
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var GitHubBranch */
    private $branch;

    /** @var DateTime */
    private $recreatedAt;

    public function __construct(GitHubRepoRootId $id, GitHubBranch $branch, DateTime $recreatedAt)
    {
        $this->id          = $id;
        $this->branch      = $branch;
        $this->recreatedAt = $recreatedAt;
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

    public function getRecreatedAt(): DateTime
    {
        return $this->recreatedAt;
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
            'id'          => $this->id->serialize(),
            'branch'      => $this->branch->serialize(),
            'recreatedAt' => $this->recreatedAt->format('c'),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            GitHubRepoRootId::deserialize($data['id']),
            GitHubBranch::deserialize($data['branch']),
            new DateTime($data['recreatedAt'])
        );
    }
}
