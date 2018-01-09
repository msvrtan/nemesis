<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Domain\Event;

use DevboardLib\Git\Tag\TagName;
use DevboardLib\GitHub\Repo\RepoId;

interface GitHubTagEvent
{
    public function getRepoId(): RepoId;

    public function getName(): TagName;
}
