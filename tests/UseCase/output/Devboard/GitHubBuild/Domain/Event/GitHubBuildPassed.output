<?php

declare(strict_types=1);

namespace Devboard\GitHubBuild\Domain\Event;

use Broadway\Serializer\Serializable;
use Carbon\Carbon;
use DateTime;
use Devboard\GitHubBuild\Core\GitHubBuildId;
use DevboardLib\GitHub\Build\BuildStatus;

/**
 * @see \spec\Devboard\GitHubBuild\Domain\Event\GitHubBuildPassedSpec
 * @see \Tests\Devboard\GitHubBuild\Domain\Event\GitHubBuildPassedTest
 */
class GitHubBuildPassed implements GitHubBuildEvent, Serializable
{
    /** @var GitHubBuildId */
    private $buildId;

    /** @var DateTime */
    private $createdAt;

    public function __construct(GitHubBuildId $buildId, DateTime $createdAt)
    {
        $this->buildId   = $buildId;
        $this->createdAt = $createdAt;
    }

    public static function create(GitHubBuildId $buildId): self
    {
        return new self($buildId, Carbon::now());
    }

    public function getBuildId(): GitHubBuildId
    {
        return $this->buildId;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getBuildNumber(): int
    {
        return $this->buildId->getBuildNumber();
    }

    public function getBuildStatus(): BuildStatus
    {
        return BuildStatus::Passed();
    }

    public function serialize(): array
    {
        return [
            'buildId'   => $this->buildId->serialize(),
            'createdAt' => $this->createdAt->format('c'),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(GitHubBuildId::deserialize($data['buildId']), new DateTime($data['createdAt']));
    }
}
