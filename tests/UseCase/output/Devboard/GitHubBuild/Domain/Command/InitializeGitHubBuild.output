<?php

declare(strict_types=1);

namespace Devboard\GitHubBuild\Domain\Command;

use Devboard\GitHubBuild\Core\GitHubBuildRootId;

/**
 * @see \spec\Devboard\GitHubBuild\Domain\Command\InitializeGitHubBuildSpec
 * @see \Tests\Devboard\GitHubBuild\Domain\Command\InitializeGitHubBuildTest
 */
class InitializeGitHubBuild
{
    /** @var GitHubBuildRootId */
    private $gitHubBuildRootId;

    public function __construct(GitHubBuildRootId $gitHubBuildRootId)
    {
        $this->gitHubBuildRootId = $gitHubBuildRootId;
    }

    public function getGitHubBuildRootId(): GitHubBuildRootId
    {
        return $this->gitHubBuildRootId;
    }

    public function serialize(): string
    {
        return $this->gitHubBuildRootId->serialize();
    }

    public static function deserialize(string $encodedValue): self
    {
        return new self(GitHubBuildRootId::deserialize($gitHubBuildRootId));
    }
}
