<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\User;

use DevboardLib\GitHub\Account\AccountAvatarUrl;

/**
 * @see \spec\DevboardLib\GitHub\User\UserAvatarUrlSpec
 * @see \Tests\DevboardLib\GitHub\User\UserAvatarUrlTest
 */
class UserAvatarUrl extends AccountAvatarUrl
{
    /** @var string */
    private $avatarUrl;

    public function __construct(string $avatarUrl)
    {
        $this->avatarUrl = $avatarUrl;
    }

    public function getAvatarUrl(): string
    {
        return $this->avatarUrl;
    }

    public function getValue(): string
    {
        return $this->avatarUrl;
    }

    public function __toString(): string
    {
        return $this->avatarUrl;
    }

    public function serialize(): string
    {
        return $this->avatarUrl;
    }

    public static function deserialize(string $avatarUrl): self
    {
        return new self($avatarUrl);
    }
}
