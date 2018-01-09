<?php

declare(strict_types=1);

namespace Devboard\GitHubBuild\Domain\Event;

use Broadway\Serializer\Serializable;
use Carbon\Carbon;
use DateTime;
use Devboard\GitHubBuild\Core\GitHubBuildId;
use DevboardLib\GitHub\GitHubStatus;
use DevboardLib\GitHub\Status\StatusContext;
use DevboardLib\GitHub\Status\StatusState;

/**
 * @see \spec\Devboard\GitHubBuild\Domain\Event\GitHubBuildItemSuccessSpec
 * @see \Tests\Devboard\GitHubBuild\Domain\Event\GitHubBuildItemSuccessTest
 */
class GitHubBuildItemSuccess implements GitHubBuildEvent, GitHubBuildItemEvent, Serializable
{
    /** @var GitHubBuildId */
    private $buildId;

    /** @var GitHubStatus */
    private $status;

    /** @var DateTime */
    private $createdAt;

    public function __construct(GitHubBuildId $buildId, GitHubStatus $status, DateTime $createdAt)
    {
        $this->buildId   = $buildId;
        $this->status    = $status;
        $this->createdAt = $createdAt;
    }

    public static function create(GitHubBuildId $buildId, GitHubStatus $status): self
    {
        return new self($buildId, $status, Carbon::now());
    }

    public function getBuildId(): GitHubBuildId
    {
        return $this->buildId;
    }

    public function getStatus(): GitHubStatus
    {
        return $this->status;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getBuildNumber(): int
    {
        return $this->buildId->getBuildNumber();
    }

    public function getContext(): StatusContext
    {
        return $this->status->getContext();
    }

    public function getState(): StatusState
    {
        return $this->status->getState();
    }

    public function serialize(): array
    {
        return [
            'buildId'   => $this->buildId->serialize(),
            'status'    => $this->status->serialize(),
            'createdAt' => $this->createdAt->format('c'),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            GitHubBuildId::deserialize($data['buildId']),
            GitHubStatus::deserialize($data['status']),
            new DateTime($data['createdAt'])
        );
    }
}
