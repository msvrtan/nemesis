<?php

declare(strict_types=1);

namespace DevboardLib\Git\Commit;

use DateTime;
use Git\Commit\CommitDate as CommitDateInterface;

/**
 * @see \spec\DevboardLib\Git\Commit\CommitDateSpec
 * @see \Tests\DevboardLib\Git\Commit\CommitDateTest
 */
class CommitDate extends DateTime implements CommitDateInterface
{
    public function __toString(): string
    {
        return $this->format('c');
    }

    public static function createFromFormat($format, $time, $object = null): self
    {
        $date = parent::createFromFormat($format, $time, $object);

        return new self($date->format('c'));
    }

    public function serialize(): string
    {
        return $this->__toString();
    }

    public static function deserialize($value): self
    {
        return new self($value);
    }
}
