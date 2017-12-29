<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\Branch\BranchProtectionUrl;
use DevboardLib\GitHub\Repo\RepoFullName;
use Git\Reference;

/**
 * @see \spec\DevboardLib\GitHub\GitHubBranchSpec
 * @see \Tests\DevboardLib\GitHub\GitHubBranchTest
 */
class GitHubBranch implements Reference
{
    /** @var RepoFullName */
    private $repoFullName;

    /** @var BranchName */
    private $name;

    /** @var GitHubCommit */
    private $commit;

    /** @var bool */
    private $protected;

    /** @var BranchProtectionUrl */
    private $protectionUrl;

    public function __construct(
        RepoFullName $repoFullName,
        BranchName $name,
        GitHubCommit $commit,
        bool $protected,
        BranchProtectionUrl $protectionUrl
    ) {
        $this->repoFullName  = $repoFullName;
        $this->name          = $name;
        $this->commit        = $commit;
        $this->protected     = $protected;
        $this->protectionUrl = $protectionUrl;
    }

    public function getRepoFullName(): RepoFullName
    {
        return $this->repoFullName;
    }

    public function getName(): BranchName
    {
        return $this->name;
    }

    public function getCommit(): GitHubCommit
    {
        return $this->commit;
    }

    public function getProtected(): bool
    {
        return $this->protected;
    }

    public function getProtectionUrl(): BranchProtectionUrl
    {
        return $this->protectionUrl;
    }

    public function serialize(): array
    {
        return [
            'repoFullName'  => $this->repoFullName->serialize(),
            'name'          => $this->name->serialize(),
            'commit'        => $this->commit->serialize(),
            'protected'     => $this->protected,
            'protectionUrl' => $this->protectionUrl->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            RepoFullName::deserialize($data['repoFullName']),
            BranchName::deserialize($data['name']),
            GitHubCommit::deserialize($data['commit']),
            $data['protected'],
            BranchProtectionUrl::deserialize($data['protectionUrl'])
        );
    }
}
