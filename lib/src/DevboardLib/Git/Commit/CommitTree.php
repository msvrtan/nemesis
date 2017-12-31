<?php

declare(strict_types=1);

namespace DevboardLib\Git\Commit;

use Git\Commit\CommitTree as CommitTreeInterface;

/**
 * @see \spec\DevboardLib\Git\Commit\CommitTreeSpec
 * @see \Tests\DevboardLib\Git\Commit\CommitTreeTest
 */
class CommitTree implements CommitTreeInterface
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
