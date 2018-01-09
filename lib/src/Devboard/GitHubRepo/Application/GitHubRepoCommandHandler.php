<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Application;

use Broadway\CommandHandling\SimpleCommandHandler;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\GitHubRepoModel;

/**
 * @see \spec\Devboard\GitHubRepo\Application\GitHubRepoCommandHandlerSpec
 * @see \Tests\Devboard\GitHubRepo\Application\GitHubRepoCommandHandlerTest
 */
class GitHubRepoCommandHandler extends SimpleCommandHandler
{
    /** @var GitHubRepoRepository */
    private $repository;

    public function __construct(GitHubRepoRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function load(GitHubRepoRootId $id): GitHubRepoModel
    {
        return $this->repository->load($id);
    }

    protected function save(GitHubRepoModel $model)
    {
        $this->repository->save($model);
    }
}
