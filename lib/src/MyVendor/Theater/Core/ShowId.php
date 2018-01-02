<?php

declare(strict_types=1);

namespace MyVendor\Theater\Core;

/**
 * @see \spec\MyVendor\Theater\Core\ShowIdSpec
 * @see \Tests\MyVendor\Theater\Core\ShowIdTest
 */
class ShowId
{
    const RANDOM_CONST = 163;

    /** @var int */
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }

    public function serialize(): int
    {
        return $this->id;
    }

    public static function deserialize(int $id): self
    {
        return new self($id);
    }
}
