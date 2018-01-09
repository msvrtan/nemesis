<?php

declare(strict_types=1);

namespace DevboardLib\Git\Commit;

use Git\Commit\CommitParent as CommitParentInterface;

/**
 * @see \spec\DevboardLib\Git\Commit\CommitParentSpec
 * @see \Tests\DevboardLib\Git\Commit\CommitParentTest
 */
class CommitParent implements CommitParentInterface
{
    /** @var CommitSha */
    private $sha;

    public function __construct(CommitSha $sha)
    {
        $this->sha = $sha;
    }

    public function getSha(): CommitSha
    {
        return $this->sha;
    }

    public function serialize(): string
    {
        return $this->sha->serialize();
    }

    public static function deserialize(string $sha): self
    {
        return new self(CommitSha::deserialize($sha));
    }
}
