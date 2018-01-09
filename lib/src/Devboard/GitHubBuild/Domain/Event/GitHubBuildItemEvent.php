<?php

declare(strict_types=1);

namespace Devboard\GitHubBuild\Domain\Event;

use DevboardLib\GitHub\Status\StatusContext;

interface GitHubBuildItemEvent
{
    public function getBuildNumber(): int;

    public function getContext(): StatusContext;
}
