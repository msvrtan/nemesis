<?php

declare(strict_types=1);

namespace DevboardLib\Git\Commit;

use Git\Commit\CommitMessage as CommitMessageInterface;

/**
 * @see \spec\DevboardLib\Git\Commit\CommitMessageSpec
 * @see \Tests\DevboardLib\Git\Commit\CommitMessageTest
 */
class CommitMessage implements CommitMessageInterface
{
    /** @var string */
    private $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getValue(): string
    {
        return $this->message;
    }

    public function __toString(): string
    {
        return $this->message;
    }

    public function serialize(): string
    {
        return $this->message;
    }

    public static function deserialize(string $message): self
    {
        return new self($message);
    }
}
