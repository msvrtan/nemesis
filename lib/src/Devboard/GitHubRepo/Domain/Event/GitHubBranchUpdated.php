<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain\Event;

use Broadway\Serializer\Serializable;
use Carbon\Carbon;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\Repo\RepoId;

/**
 * @see \spec\Devboard\GitHubRepo\Domain\Event\GitHubBranchUpdatedSpec
 * @see \Tests\Devboard\GitHubRepo\Domain\Event\GitHubBranchUpdatedTest
 */
class GitHubBranchUpdated implements GitHubBranchEvent, Serializable
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var BranchName */
    private $name;

    /** @var GitHubCommit */
    private $commit;

    /** @var DateTime */
    private $updatedAt;

    public function __construct(GitHubRepoRootId $id, BranchName $name, GitHubCommit $commit, DateTime $updatedAt)
    {
        $this->id        = $id;
        $this->name      = $name;
        $this->commit    = $commit;
        $this->updatedAt = $updatedAt;
    }

    public static function create(GitHubRepoRootId $id, BranchName $name, GitHubCommit $commit): self
    {
        return new self($id, $name, $commit, Carbon::now());
    }

    public function getId(): GitHubRepoRootId
    {
        return $this->id;
    }

    public function getName(): BranchName
    {
        return $this->name;
    }

    public function getCommit(): GitHubCommit
    {
        return $this->commit;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
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
            'commit'    => $this->commit->serialize(),
            'updatedAt' => $this->updatedAt->format('c'),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            GitHubRepoRootId::deserialize($data['id']),
            BranchName::deserialize($data['name']),
            GitHubCommit::deserialize($data['commit']),
            new DateTime($data['updatedAt'])
        );
    }
}
