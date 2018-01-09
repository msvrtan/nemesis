<?php

declare(strict_types=1);

namespace Devboard\GitHubBuild\Domain\Command;

use Devboard\GitHubBuild\Core\GitHubBuildRootId;
use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\GitHubStatus;

/**
 * @see \spec\Devboard\GitHubBuild\Domain\Command\ProcessGitHubStatusSpec
 * @see \Tests\Devboard\GitHubBuild\Domain\Command\ProcessGitHubStatusTest
 */
class ProcessGitHubStatus
{
    /** @var GitHubBuildRootId */
    private $gitHubBuildRootId;

    /** @var CommitSha */
    private $commitSha;

    /** @var GitHubStatus */
    private $status;

    public function __construct(GitHubBuildRootId $gitHubBuildRootId, CommitSha $commitSha, GitHubStatus $status)
    {
        $this->gitHubBuildRootId = $gitHubBuildRootId;
        $this->commitSha         = $commitSha;
        $this->status            = $status;
    }

    public function getGitHubBuildRootId(): GitHubBuildRootId
    {
        return $this->gitHubBuildRootId;
    }

    public function getCommitSha(): CommitSha
    {
        return $this->commitSha;
    }

    public function getStatus(): GitHubStatus
    {
        return $this->status;
    }

    public function serialize(): array
    {
        return [
            'gitHubBuildRootId' => $this->gitHubBuildRootId->serialize(),
            'commitSha'         => $this->commitSha->serialize(),
            'status'            => $this->status->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            GitHubBuildRootId::deserialize($data['gitHubBuildRootId']),
            CommitSha::deserialize($data['commitSha']),
            GitHubStatus::deserialize($data['status'])
        );
    }
}
