<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain;

use Broadway\EventSourcing\SimpleEventSourcedEntity;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use DevboardLib\Git\Tag\TagName;
use DevboardLib\GitHub\GitHubCommit;

/**
 * @see \spec\Devboard\GitHubRepo\Domain\GitHubTagEntitySpec
 * @see \Tests\Devboard\GitHubRepo\Domain\GitHubTagEntityTest
 */
class GitHubTagEntity extends SimpleEventSourcedEntity
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var TagName */
    private $name;

    /** @var GitHubCommit */
    private $commit;

    /** @var DateTime */
    private $createdAt;

    /** @var DateTime */
    private $updatedAt;

    /** @var bool */
    private $deleted = false;

    public function __construct(
        GitHubRepoRootId $id, TagName $name, GitHubCommit $commit, DateTime $createdAt, DateTime $updatedAt
    ) {
        $this->id        = $id;
        $this->name      = $name;
        $this->commit    = $commit;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getName(): TagName
    {
        return $this->name;
    }
}
