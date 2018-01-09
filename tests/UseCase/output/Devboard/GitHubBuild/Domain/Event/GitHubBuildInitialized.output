<?php

declare(strict_types=1);

namespace Devboard\GitHubBuild\Domain\Event;

use Broadway\Serializer\Serializable;
use Carbon\Carbon;
use DateTime;
use Devboard\GitHubBuild\Core\GitHubBuildRootId;

/**
 * @see \spec\Devboard\GitHubBuild\Domain\Event\GitHubBuildInitializedSpec
 * @see \Tests\Devboard\GitHubBuild\Domain\Event\GitHubBuildInitializedTest
 */
class GitHubBuildInitialized implements Serializable
{
    /** @var GitHubBuildRootId */
    private $buildRootId;

    /** @var DateTime */
    private $initializedAt;

    public function __construct(GitHubBuildRootId $buildRootId, DateTime $initializedAt)
    {
        $this->buildRootId   = $buildRootId;
        $this->initializedAt = $initializedAt;
    }

    public static function create(GitHubBuildRootId $buildRootId): self
    {
        return new self($buildRootId, Carbon::now());
    }

    public function getBuildRootId(): GitHubBuildRootId
    {
        return $this->buildRootId;
    }

    public function getInitializedAt(): DateTime
    {
        return $this->initializedAt;
    }

    public function serialize(): array
    {
        return [
            'buildRootId'   => $this->buildRootId->serialize(),
            'initializedAt' => $this->initializedAt->format('c'),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(GitHubBuildRootId::deserialize($data['buildRootId']), new DateTime($data['initializedAt']));
    }
}
