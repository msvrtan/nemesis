<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\User;

use DevboardLib\GitHub\Account\AccountHtmlUrl;

/**
 * @see \spec\DevboardLib\GitHub\User\UserHtmlUrlSpec
 * @see \Tests\DevboardLib\GitHub\User\UserHtmlUrlTest
 */
class UserHtmlUrl extends AccountHtmlUrl
{
    /** @var string */
    private $htmlUrl;

    public function __construct(string $htmlUrl)
    {
        $this->htmlUrl = $htmlUrl;
    }

    public function getHtmlUrl(): string
    {
        return $this->htmlUrl;
    }

    public function getValue(): string
    {
        return $this->htmlUrl;
    }

    public function __toString(): string
    {
        return $this->htmlUrl;
    }

    public function serialize(): string
    {
        return $this->htmlUrl;
    }

    public static function deserialize(string $htmlUrl): self
    {
        return new self($htmlUrl);
    }
}
