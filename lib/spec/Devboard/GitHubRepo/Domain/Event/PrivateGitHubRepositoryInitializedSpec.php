<?php

declare(strict_types=1);

namespace spec\Devboard\GitHubRepo\Domain\Event;

use Broadway\Serializer\Serializable;
use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\Event\PrivateGitHubRepositoryInitialized;
use DevboardLib\GitHub\Repo\RepoDescription;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoOwner;
use DevboardLib\GitHub\Repo\RepoParent;
use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use PhpSpec\ObjectBehavior;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class PrivateGitHubRepositoryInitializedSpec extends ObjectBehavior
{
    public function let(
        GitHubRepoRootId $id,
        RepoFullName $fullName,
        RepoOwner $owner,
        RepoDescription $description,
        RepoParent $parent,
        RepoEndpoints $endpoints,
        RepoTimestamps $timestamps,
        RepoStats $stats,
        DateTime $initializedAt
    ) {
        $this->beConstructedWith(
            $id, $fullName, $owner, $description, $parent, $endpoints, $timestamps, $stats, $initializedAt
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PrivateGitHubRepositoryInitialized::class);
        $this->shouldImplement(Serializable::class);
    }

    public function it_has_a_helper_factory_method(
        GitHubRepoRootId $id,
        RepoFullName $fullName,
        RepoOwner $owner,
        RepoDescription $description,
        RepoParent $parent,
        RepoEndpoints $endpoints,
        RepoTimestamps $timestamps,
        RepoStats $stats
    ) {
        $this->create($id, $fullName, $owner, $description, $parent, $endpoints, $timestamps, $stats)->shouldReturnAnInstanceOf(
            PrivateGitHubRepositoryInitialized::class
        );
    }

    public function it_exposes_id(GitHubRepoRootId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_full_name(RepoFullName $fullName)
    {
        $this->getFullName()->shouldReturn($fullName);
    }

    public function it_exposes_owner(RepoOwner $owner)
    {
        $this->getOwner()->shouldReturn($owner);
    }

    public function it_exposes_description(RepoDescription $description)
    {
        $this->getDescription()->shouldReturn($description);
    }

    public function it_exposes_parent(RepoParent $parent)
    {
        $this->getParent()->shouldReturn($parent);
    }

    public function it_exposes_endpoints(RepoEndpoints $endpoints)
    {
        $this->getEndpoints()->shouldReturn($endpoints);
    }

    public function it_exposes_timestamps(RepoTimestamps $timestamps)
    {
        $this->getTimestamps()->shouldReturn($timestamps);
    }

    public function it_exposes_stats(RepoStats $stats)
    {
        $this->getStats()->shouldReturn($stats);
    }

    public function it_exposes_initialized_at(DateTime $initializedAt)
    {
        $this->getInitializedAt()->shouldReturn($initializedAt);
    }

    public function it_has_owner()
    {
        $this->hasOwner()->shouldReturn(true);
    }

    public function it_has_description()
    {
        $this->hasDescription()->shouldReturn(true);
    }

    public function it_has_parent()
    {
        $this->hasParent()->shouldReturn(true);
    }

    public function it_can_be_serialized(
        GitHubRepoRootId $id,
        RepoFullName $fullName,
        RepoOwner $owner,
        RepoDescription $description,
        RepoParent $parent,
        RepoEndpoints $endpoints,
        RepoTimestamps $timestamps,
        RepoStats $stats,
        DateTime $initializedAt
    ) {
        $id->serialize()->shouldBeCalled()->willReturn('R0hSZXBvUm9vdDoxMjM=');
        $fullName->serialize()->shouldBeCalled()->willReturn(['owner' => 'value', 'repoName' => 'name']);
        $owner->serialize()->shouldBeCalled()->willReturn(
            [
                'userId'     => 1,
                'login'      => 'value',
                'type'       => 'type',
                'avatarUrl'  => 'avatarUrl',
                'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                'htmlUrl'    => 'htmlUrl',
                'apiUrl'     => 'apiUrl',
                'siteAdmin'  => true,
            ]
        );
        $description->serialize()->shouldBeCalled()->willReturn('description');
        $parent->serialize()->shouldBeCalled()->willReturn(
            ['id' => 1, 'fullName' => ['owner' => 'value', 'repoName' => 'name']]
        );
        $endpoints->serialize()->shouldBeCalled()->willReturn(
            ['htmlUrl' => 'htmlUrl', 'apiUrl' => 'apiUrl', 'gitUrl' => 'gitUrl', 'sshUrl' => 'sshUrl']
        );
        $timestamps->serialize()->shouldBeCalled()->willReturn(
            [
                'createdAt' => '2018-01-01T00:01:00+00:00',
                'updatedAt' => '2018-01-01T00:01:00+00:00',
                'pushedAt'  => '2018-01-01T00:01:00+00:00',
            ]
        );
        $stats->serialize()->shouldBeCalled()->willReturn(
            [
                'networkCount'     => 1,
                'watchersCount'    => 1,
                'stargazersCount'  => 1,
                'subscribersCount' => 1,
                'openIssuesCount'  => 1,
                'size'             => 1,
            ]
        );
        $initializedAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn(
            [
                'id'       => 'R0hSZXBvUm9vdDoxMjM=',
                'fullName' => ['owner' => 'value', 'repoName' => 'name'],
                'owner'    => [
                    'userId'     => 1,
                    'login'      => 'value',
                    'type'       => 'type',
                    'avatarUrl'  => 'avatarUrl',
                    'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                    'htmlUrl'    => 'htmlUrl',
                    'apiUrl'     => 'apiUrl',
                    'siteAdmin'  => true,
                ],
                'description' => 'description',
                'parent'      => ['id' => 1, 'fullName' => ['owner' => 'value', 'repoName' => 'name']],
                'endpoints'   => [
                    'htmlUrl' => 'htmlUrl',
                    'apiUrl'  => 'apiUrl',
                    'gitUrl'  => 'gitUrl',
                    'sshUrl'  => 'sshUrl',
                ],
                'timestamps' => [
                    'createdAt' => '2018-01-01T00:01:00+00:00',
                    'updatedAt' => '2018-01-01T00:01:00+00:00',
                    'pushedAt'  => '2018-01-01T00:01:00+00:00',
                ],
                'stats' => [
                    'networkCount'     => 1,
                    'watchersCount'    => 1,
                    'stargazersCount'  => 1,
                    'subscribersCount' => 1,
                    'openIssuesCount'  => 1,
                    'size'             => 1,
                ],
                'initializedAt' => '2018-01-01T00:01:00+00:00',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'id'       => 'R0hSZXBvUm9vdDoxMjM=',
            'fullName' => ['owner' => 'value', 'repoName' => 'name'],
            'owner'    => [
                'userId'     => 1,
                'login'      => 'value',
                'type'       => 'type',
                'avatarUrl'  => 'avatarUrl',
                'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                'htmlUrl'    => 'htmlUrl',
                'apiUrl'     => 'apiUrl',
                'siteAdmin'  => true,
            ],
            'description' => 'description',
            'parent'      => ['id' => 1, 'fullName' => ['owner' => 'value', 'repoName' => 'name']],
            'endpoints'   => ['htmlUrl' => 'htmlUrl', 'apiUrl' => 'apiUrl', 'gitUrl' => 'gitUrl', 'sshUrl' => 'sshUrl'],
            'timestamps'  => [
                'createdAt' => '2018-01-01T00:01:00+00:00',
                'updatedAt' => '2018-01-01T00:01:00+00:00',
                'pushedAt'  => '2018-01-01T00:01:00+00:00',
            ],
            'stats' => [
                'networkCount'     => 1,
                'watchersCount'    => 1,
                'stargazersCount'  => 1,
                'subscribersCount' => 1,
                'openIssuesCount'  => 1,
                'size'             => 1,
            ],
            'initializedAt' => '2018-01-01T00:01:00+00:00',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(PrivateGitHubRepositoryInitialized::class);
    }
}
