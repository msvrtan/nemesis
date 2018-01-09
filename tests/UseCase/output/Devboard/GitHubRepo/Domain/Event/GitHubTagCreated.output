<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain\Event;

use Broadway\Serializer\Serializable;
use Carbon\Carbon;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use DevboardLib\Git\Tag\TagName;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\GitHubTag;
use DevboardLib\GitHub\Repo\RepoId;

/**
 * @see \spec\Devboard\GitHubRepo\Domain\Event\GitHubTagCreatedSpec
 * @see \Tests\Devboard\GitHubRepo\Domain\Event\GitHubTagCreatedTest
 */
class GitHubTagCreated implements GitHubTagEvent, Serializable
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var GitHubTag */
    private $tag;

    /** @var DateTime */
    private $createdAt;

    public function __construct(GitHubRepoRootId $id, GitHubTag $tag, DateTime $createdAt)
    {
        $this->id        = $id;
        $this->tag       = $tag;
        $this->createdAt = $createdAt;
    }

    public static function create(GitHubRepoRootId $id, GitHubTag $tag): self
    {
        return new self($id, $tag, Carbon::now());
    }

    public function getId(): GitHubRepoRootId
    {
        return $this->id;
    }

    public function getTag(): GitHubTag
    {
        return $this->tag;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getRepoId(): RepoId
    {
        return $this->id->getRepoId();
    }

    public function getName(): TagName
    {
        return $this->tag->getName();
    }

    public function getCommit(): GitHubCommit
    {
        return $this->tag->getCommit();
    }

    public function serialize(): array
    {
        return [
            'id'        => $this->id->serialize(),
            'tag'       => $this->tag->serialize(),
            'createdAt' => $this->createdAt->format('c'),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            GitHubRepoRootId::deserialize($data['id']),
            GitHubTag::deserialize($data['tag']),
            new DateTime($data['createdAt'])
        );
    }
}
