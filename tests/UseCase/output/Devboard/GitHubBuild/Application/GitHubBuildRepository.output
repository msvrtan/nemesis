<?php

declare(strict_types=1);

namespace Devboard\GitHubBuild\Application;

use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStore;
use Devboard\GitHubBuild\Domain\GitHubBuildModel;

/**
 * @see \spec\Devboard\GitHubBuild\Application\GitHubBuildRepositorySpec
 * @see \Tests\Devboard\GitHubBuild\Application\GitHubBuildRepositoryTest
 */
class GitHubBuildRepository extends EventSourcingRepository
{
    public function __construct(EventStore $eventStore, EventBus $eventBus, array $eventStreamDecorators = [])
    {
        parent::__construct(
            $eventStore,
            $eventBus,
            GitHubBuildModel::class,
            new PublicConstructorAggregateFactory(),
            $eventStreamDecorators
        );
    }
}
