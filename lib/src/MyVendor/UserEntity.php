<?php

declare(strict_types=1);

namespace MyVendor;

use DateTime;
use MyVendor\Base\SomeInterface as BaseSomeInterface;
use MyVendor\Base\UserEntity as BaseUser;
use MyVendor\User\UserCreatedAt;
use MyVendor\User\UserId;
use MyVendor\User\Username;

/**
 * @see \spec\MyVendor\UserEntitySpec
 * @see \Tests\MyVendor\UserEntityTest
 */
class UserEntity extends BaseUser implements SomeInterface, BaseSomeInterface
{
    const RANDOM_CONST = 249;

    /** @var UserId */
    private $id;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var Username */
    private $username;

    /** @var bool */
    private $active;

    /** @var UserCreatedAt */
    private $createdAt;

    /** @var DateTime */
    private $updatedAt;

    public function __construct(
        UserId $id,
        string $firstName,
        string $lastName,
        Username $username,
        bool $active,
        UserCreatedAt $createdAt,
        DateTime $updatedAt
    ) {
        $this->id        = $id;
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        $this->username  = $username;
        $this->active    = $active;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getUsername(): Username
    {
        return $this->username;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getCreatedAt(): UserCreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function serialize(): array
    {
        return [
            'id'        => $this->id->serialize(),
            'firstName' => $this->firstName,
            'lastName'  => $this->lastName,
            'username'  => $this->username->serialize(),
            'active'    => $this->active,
            'createdAt' => $this->createdAt->serialize(),
            'updatedAt' => $this->updatedAt->format('c'),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            UserId::deserialize($data['id']),
            $data['firstName'],
            $data['lastName'],
            Username::deserialize($data['username']),
            $data['active'],
            UserCreatedAt::deserialize($data['createdAt']),
            new DateTime($data['updatedAt'])
        );
    }
}
