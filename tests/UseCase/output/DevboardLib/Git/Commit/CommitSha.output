<?php

declare(strict_types=1);

namespace DevboardLib\Git\Commit;

use Git\Commit\CommitSha as CommitShaInterface;

/**
 * @see \spec\DevboardLib\Git\Commit\CommitShaSpec
 * @see \Tests\DevboardLib\Git\Commit\CommitShaTest
 */
class CommitSha implements CommitShaInterface
{
    /** @var string */
    private $sha;

    public function __construct(string $sha)
    {
        $this->sha = $sha;
    }

    public function getSha(): string
    {
        return $this->sha;
    }

    public function getValue(): string
    {
        return $this->sha;
    }

    public function __toString(): string
    {
        return $this->sha;
    }

    public function serialize(): string
    {
        return $this->sha;
    }

    public static function deserialize(string $sha): self
    {
        return new self($sha);
    }
}
