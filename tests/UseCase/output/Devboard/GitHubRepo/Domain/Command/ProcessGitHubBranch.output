<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain\Command;

use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use DevboardLib\GitHub\GitHubBranch;

/**
 * @see \spec\Devboard\GitHubRepo\Domain\Command\ProcessGitHubBranchSpec
 * @see \Tests\Devboard\GitHubRepo\Domain\Command\ProcessGitHubBranchTest
 */
class ProcessGitHubBranch
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var GitHubBranch */
    private $branch;

    public function __construct(GitHubRepoRootId $id, GitHubBranch $branch)
    {
        $this->id     = $id;
        $this->branch = $branch;
    }

    public function getId(): GitHubRepoRootId
    {
        return $this->id;
    }

    public function getBranch(): GitHubBranch
    {
        return $this->branch;
    }

    public function serialize(): array
    {
        return [
            'id'     => $this->id->serialize(),
            'branch' => $this->branch->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(GitHubRepoRootId::deserialize($data['id']), GitHubBranch::deserialize($data['branch']));
    }
}
