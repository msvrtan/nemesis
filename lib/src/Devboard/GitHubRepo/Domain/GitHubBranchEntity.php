<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain;

use Broadway\EventSourcing\SimpleEventSourcedEntity;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\GitHubCommit;

/**
 * @see \spec\Devboard\GitHubRepo\Domain\GitHubBranchEntitySpec
 * @see \Tests\Devboard\GitHubRepo\Domain\GitHubBranchEntityTest
 */
class GitHubBranchEntity extends SimpleEventSourcedEntity
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var BranchName */
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
        GitHubRepoRootId $id,
        BranchName $name,
        GitHubCommit $commit,
        DateTime $createdAt,
        DateTime $updatedAt,
        bool $deleted = false
    ) {
        $this->id        = $id;
        $this->name      = $name;
        $this->commit    = $commit;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deleted   = $deleted;
    }

    public function getName(): BranchName
    {
        return $this->name;
    }
}
