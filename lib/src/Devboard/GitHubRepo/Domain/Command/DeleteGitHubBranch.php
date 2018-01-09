<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain\Command;

use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use DevboardLib\Git\Branch\BranchName;

/**
 * @see \spec\Devboard\GitHubRepo\Domain\Command\DeleteGitHubBranchSpec
 * @see \Tests\Devboard\GitHubRepo\Domain\Command\DeleteGitHubBranchTest
 */
class DeleteGitHubBranch
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var BranchName */
    private $name;

    public function __construct(GitHubRepoRootId $id, BranchName $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    public function getId(): GitHubRepoRootId
    {
        return $this->id;
    }

    public function getName(): BranchName
    {
        return $this->name;
    }

    public function serialize(): array
    {
        return [
            'id'   => $this->id->serialize(),
            'name' => $this->name->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(GitHubRepoRootId::deserialize($data['id']), BranchName::deserialize($data['name']));
    }
}
