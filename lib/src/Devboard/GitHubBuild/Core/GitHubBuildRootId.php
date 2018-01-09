<?php

declare(strict_types=1);

namespace Devboard\GitHubBuild\Core;

/**
 * @see \spec\Devboard\GitHubBuild\Core\GitHubBuildRootIdSpec
 * @see \Tests\Devboard\GitHubBuild\Core\GitHubBuildRootIdTest
 */
class GitHubBuildRootId
{
    /** @var string */
    private $encodedValue;

    public function __construct(string $encodedValue)
    {
        $this->encodedValue = $encodedValue;
    }

    public function getEncodedValue(): string
    {
        return $this->encodedValue;
    }

    public function getId(): string
    {
        return $this->encodedValue;
    }

    public function __toString(): string
    {
        return $this->encodedValue;
    }

    public function serialize(): string
    {
        return $this->encodedValue;
    }

    public static function deserialize(string $encodedValue): self
    {
        return new self($encodedValue);
    }
}
