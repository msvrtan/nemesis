<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\Git\Commit\Committer\CommitterName;
use Git\Commit\CommitCommitter as CommitCommitterInterface;

/**
 * @see \spec\DevboardLib\GitHub\Commit\CommitCommitterSpec
 * @see \Tests\DevboardLib\GitHub\Commit\CommitCommitterTest
 */
class CommitCommitter implements CommitCommitterInterface
{
    /** @var CommitterName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $commitDate;

    /** @var CommitCommitterDetails|null */
    private $committerDetails;

    public function __construct(
        CommitterName $name, EmailAddress $email, CommitDate $commitDate, ?CommitCommitterDetails $committerDetails
    ) {
        $this->name             = $name;
        $this->email            = $email;
        $this->commitDate       = $commitDate;
        $this->committerDetails = $committerDetails;
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

    public function getCommitterDetails(): ?CommitCommitterDetails
    {
        return $this->committerDetails;
    }

    public function hasCommitterDetails(): bool
    {
        if (null === $this->committerDetails) {
            return false;
        }

        return true;
    }

    public function serialize(): array
    {
        if (null === $this->committerDetails) {
            $committerDetails = null;
        } else {
            $committerDetails = $this->committerDetails->serialize();
        }

        return [
            'name'             => $this->name->serialize(),
            'email'            => $this->email->serialize(),
            'commitDate'       => $this->commitDate->serialize(),
            'committerDetails' => $committerDetails,
        ];
    }

    public static function deserialize(array $data): self
    {
        if (null === $data['committerDetails']) {
            $committerDetails = null;
        } else {
            $committerDetails = CommitCommitterDetails::deserialize($data['committerDetails']);
        }

        return new self(
            CommitterName::deserialize($data['name']),
            EmailAddress::deserialize($data['email']),
            CommitDate::deserialize($data['commitDate']),
            $committerDetails
        );
    }
}
