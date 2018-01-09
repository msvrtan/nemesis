<?php

declare(strict_types=1);

namespace Devboard\GitHubBuild\Domain\Event;

use Broadway\Serializer\Serializable;
use Carbon\Carbon;
use DateTime;
use Devboard\GitHubBuild\Core\GitHubBuildId;
use DevboardLib\GitHub\Build\BuildStatus;
use DevboardLib\GitHub\GitHubCommit;
use Git\Reference\ReferenceName;

/**
 * @see \spec\Devboard\GitHubBuild\Domain\Event\GitHubBuildCreatedSpec
 * @see \Tests\Devboard\GitHubBuild\Domain\Event\GitHubBuildCreatedTest
 */
class GitHubBuildCreated implements GitHubBuildEvent, Serializable
{
    /** @var GitHubBuildId */
    private $buildId;

    /** @var ReferenceName */
    private $referenceName;

    /** @var GitHubCommit */
    private $commit;

    /** @var DateTime */
    private $createdAt;

    public function __construct(
        GitHubBuildId $buildId, ReferenceName $referenceName, GitHubCommit $commit, DateTime $createdAt
    ) {
        $this->buildId       = $buildId;
        $this->referenceName = $referenceName;
        $this->commit        = $commit;
        $this->createdAt     = $createdAt;
    }

    public static function create(GitHubBuildId $buildId, ReferenceName $referenceName, GitHubCommit $commit): self
    {
        return new self($buildId, $referenceName, $commit, Carbon::now());
    }

    public function getBuildId(): GitHubBuildId
    {
        return $this->buildId;
    }

    public function getReferenceName(): ReferenceName
    {
        return $this->referenceName;
    }

    public function getCommit(): GitHubCommit
    {
        return $this->commit;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getBuildNumber(): int
    {
        return $this->buildId->getBuildNumber();
    }

    public function getBuildStatus(): BuildStatus
    {
        return BuildStatus::Created();
    }

    public function serialize(): array
    {
        return [
            'buildId'       => $this->buildId->serialize(),
            'referenceName' => $this->referenceName->serialize(),
            'commit'        => $this->commit->serialize(),
            'createdAt'     => $this->createdAt->format('c'),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            GitHubBuildId::deserialize($data['buildId']),
            ReferenceName::deserialize($data['referenceName']),
            GitHubCommit::deserialize($data['commit']),
            new DateTime($data['createdAt'])
        );
    }
}
