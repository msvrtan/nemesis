<?php

declare(strict_types=1);

namespace Devboard\GitHubRepo\Application;

use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStore;
use Devboard\GitHubRepo\Domain\GitHubRepoModel;

/**
 * @see \spec\Devboard\GitHubRepo\Application\GitHubRepoRepositorySpec
 * @see \Tests\Devboard\GitHubRepo\Application\GitHubRepoRepositoryTest
 */
class GitHubRepoRepository extends EventSourcingRepository
{
    public function __construct(EventStore $eventStore, EventBus $eventBus, array $eventStreamDecorators = [])
    {
        parent::__construct(
            $eventStore,
            $eventBus,
            GitHubRepoModel::class,
            new PublicConstructorAggregateFactory(),
            $eventStreamDecorators
        );
    }
}
