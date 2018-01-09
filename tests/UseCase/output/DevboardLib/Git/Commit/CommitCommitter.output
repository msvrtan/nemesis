<?php

declare(strict_types=1);

namespace DevboardLib\Git\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Git\Commit\Committer\CommitterName;
use Git\Commit\CommitCommitter as CommitCommitterInterface;

/**
 * @see \spec\DevboardLib\Git\Commit\CommitCommitterSpec
 * @see \Tests\DevboardLib\Git\Commit\CommitCommitterTest
 */
class CommitCommitter implements CommitCommitterInterface
{
    /** @var CommitterName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $commitDate;

    public function __construct(CommitterName $name, EmailAddress $email, CommitDate $commitDate)
    {
        $this->name       = $name;
        $this->email      = $email;
        $this->commitDate = $commitDate;
    }

    public function getName(): CommitterName
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
            CommitterName::deserialize($data['name']),
            EmailAddress::deserialize($data['email']),
            CommitDate::deserialize($data['commitDate'])
        );
    }
}
