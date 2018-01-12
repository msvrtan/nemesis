<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Account;

/**
 * @see \spec\DevboardLib\GitHub\Account\AccountTypeSpec
 * @see \Tests\DevboardLib\GitHub\Account\AccountTypeTest
 */
class AccountType
{
    /** @var string */
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getValue(): string
    {
        return $this->type;
    }

    public function __toString(): string
    {
        return $this->type;
    }

    public function serialize(): string
    {
        return $this->type;
    }

    public static function deserialize(string $type): self
    {
        return new self($type);
    }
}
