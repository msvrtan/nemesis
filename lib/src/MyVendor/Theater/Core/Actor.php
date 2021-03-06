<?php

declare(strict_types=1);

namespace MyVendor\Theater\Core;

/**
 * @see \spec\MyVendor\Theater\Core\ActorSpec
 * @see \Tests\MyVendor\Theater\Core\ActorTest
 */
class Actor
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

    public function serialize(): int
    {
        return $this->id;
    }

    public static function deserialize(int $id): self
    {
        return new self($id);
    }
}
