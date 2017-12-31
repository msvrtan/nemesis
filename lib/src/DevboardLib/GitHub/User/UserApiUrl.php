<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\User;

use DevboardLib\GitHub\Account\AccountApiUrl;

/**
 * @see \spec\DevboardLib\GitHub\User\UserApiUrlSpec
 * @see \Tests\DevboardLib\GitHub\User\UserApiUrlTest
 */
class UserApiUrl extends AccountApiUrl
{
    /** @var string */
    private $apiUrl;

    public function __construct(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    public function getValue(): string
    {
        return $this->apiUrl;
    }

    public function __toString(): string
    {
        return $this->apiUrl;
    }

    public function serialize(): string
    {
        return $this->apiUrl;
    }

    public static function deserialize(string $apiUrl): self
    {
        return new self($apiUrl);
    }
}
