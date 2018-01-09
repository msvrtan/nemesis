<?php

declare(strict_types=1);

namespace DevboardLib\Git\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Git\Commit\Author\AuthorName;
use Git\Commit\CommitAuthor as CommitAuthorInterface;

/**
 * @see \spec\DevboardLib\Git\Commit\CommitAuthorSpec
 * @see \Tests\DevboardLib\Git\Commit\CommitAuthorTest
 */
class CommitAuthor implements CommitAuthorInterface
{
    /** @var AuthorName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $commitDate;

    public function __construct(AuthorName $name, EmailAddress $email, CommitDate $commitDate)
    {
        $this->name       = $name;
        $this->email      = $email;
        $this->commitDate = $commitDate;
    }

    public function getName(): AuthorName
    {
        return $this->name;
    }

    public function getEmail(): EmailAddress
    {
        return $this->email;
    }

    public function getCommitDate(): CommitDate
    {
        return $this->commitDate;
    }

    public function serialize(): array
    {
        return [
            'name'       => $this->name->serialize(),
            'email'      => $this->email->serialize(),
            'commitDate' => $this->commitDate->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            AuthorName::deserialize($data['name']),
            EmailAddress::deserialize($data['email']),
            CommitDate::deserialize($data['commitDate'])
        );
    }
}
