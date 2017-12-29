<?php

declare(strict_types=1);

namespace DevboardLib\Generix;

/**
 * @see \spec\DevboardLib\Generix\GravatarIdSpec
 * @see \Tests\DevboardLib\Generix\GravatarIdTest
 */
class GravatarId
{
    /** @var string */
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getValue(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->id;
    }

    public function serialize(): string
    {
        return $this->id;
    }

    public static function deserialize(string $id): self
    {
        return new self($id);
    }
}
