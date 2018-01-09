<?php

declare(strict_types=1);

namespace Devboard\GitHubBuild\Application;

use Broadway\CommandHandling\SimpleCommandHandler;
use Devboard\GitHubBuild\Core\GitHubBuildRootId;
use Devboard\GitHubBuild\Domain\GitHubBuildModel;

/**
 * @see \spec\Devboard\GitHubBuild\Application\GitHubBuildCommandHandlerSpec
 * @see \Tests\Devboard\GitHubBuild\Application\GitHubBuildCommandHandlerTest
 */
class GitHubBuildCommandHandler extends SimpleCommandHandler
{
    /** @var GitHubBuildRepository */
    private $repository;

    public function __construct(GitHubBuildRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function load(GitHubBuildRootId $id): GitHubBuildModel
    {
        return $this->repository->load($id);
    }

    protected function save(GitHubBuildModel $model)
    {
        $this->repository->save($model);
    }
}
