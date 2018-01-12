<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Account;

/**
 * @see \spec\DevboardLib\GitHub\Account\AccountApiUrlSpec
 * @see \Tests\DevboardLib\GitHub\Account\AccountApiUrlTest
 */
class AccountApiUrl
{
    /** @var string */
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getValue(): string
    {
        return $this->url;
    }

    public function __toString(): string
    {
        return $this->url;
    }

    public function serialize(): string
    {
        return $this->url;
    }

    public static function deserialize(string $url): self
    {
        return new self($url);
    }
}
