<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain\Command;

use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use DevboardLib\GitHub\GitHubRepo;

/**
 * @see \spec\Devboard\GitHubRepo\Domain\Command\InitializeGitHubRepositorySpec
 * @see \Tests\Devboard\GitHubRepo\Domain\Command\InitializeGitHubRepositoryTest
 */
class InitializeGitHubRepository
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var GitHubRepo */
    private $repo;

    public function __construct(GitHubRepoRootId $id, GitHubRepo $repo)
    {
        $this->id   = $id;
        $this->repo = $repo;
    }

    public function getId(): GitHubRepoRootId
    {
        return $this->id;
    }

    public function getRepo(): GitHubRepo
    {
        return $this->repo;
    }

    public function serialize(): array
    {
        return [
            'id'   => $this->id->serialize(),
            'repo' => $this->repo->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(GitHubRepoRootId::deserialize($data['id']), GitHubRepo::deserialize($data['repo']));
    }
}
