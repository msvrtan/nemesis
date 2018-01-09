<?php

declare(strict_types=1);

namespace Devboard\GitHubBuild\Domain\Command;

use Devboard\GitHubBuild\Core\GitHubBuildRootId;
use DevboardLib\GitHub\GitHubCommit;
use Git\Reference\ReferenceName;

/**
 * @see \spec\Devboard\GitHubBuild\Domain\Command\CreateGitHubBuildSpec
 * @see \Tests\Devboard\GitHubBuild\Domain\Command\CreateGitHubBuildTest
 */
class CreateGitHubBuild
{
    /** @var GitHubBuildRootId */
    private $gitHubBuildRootId;

    /** @var ReferenceName */
    private $referenceName;

    /** @var GitHubCommit */
    private $commit;

    public function __construct(
        GitHubBuildRootId $gitHubBuildRootId, ReferenceName $referenceName, GitHubCommit $commit
    ) {
        $this->gitHubBuildRootId = $gitHubBuildRootId;
        $this->referenceName     = $referenceName;
        $this->commit            = $commit;
    }

    public function getGitHubBuildRootId(): GitHubBuildRootId
    {
        return $this->gitHubBuildRootId;
    }

    public function getReferenceName(): ReferenceName
    {
        return $this->referenceName;
    }

    public function getCommit(): GitHubCommit
    {
        return $this->commit;
    }

    public function serialize(): array
    {
        return [
            'gitHubBuildRootId' => $this->gitHubBuildRootId->serialize(),
            'referenceName'     => $this->referenceName->serialize(),
            'commit'            => $this->commit->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            GitHubBuildRootId::deserialize($data['gitHubBuildRootId']),
            ReferenceName::deserialize($data['referenceName']),
            GitHubCommit::deserialize($data['commit'])
        );
    }
}
