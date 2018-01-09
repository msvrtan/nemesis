<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain\Event;

use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\Repo\RepoId;

interface GitHubBranchEvent
{
    public function getRepoId(): RepoId;

    public function getName(): BranchName;
}
