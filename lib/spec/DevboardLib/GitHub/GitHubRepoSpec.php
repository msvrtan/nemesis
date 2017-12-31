<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\Git\Branch\BranchName;
use DevboardLib\GitHub\GitHubRepo;
use DevboardLib\GitHub\Repo\RepoDescription;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoHomepage;
use DevboardLib\GitHub\Repo\RepoId;
use DevboardLib\GitHub\Repo\RepoLanguage;
use DevboardLib\GitHub\Repo\RepoMirrorUrl;
use DevboardLib\GitHub\Repo\RepoOwner;
use DevboardLib\GitHub\Repo\RepoParent;
use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use PhpSpec\ObjectBehavior;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubRepoSpec extends ObjectBehavior
{
    public function let(
        RepoId $id,
        RepoFullName $fullName,
        RepoOwner $owner,
        BranchName $defaultBranch,
        RepoParent $parent,
        RepoDescription $description,
        RepoHomepage $homepage,
        RepoLanguage $language,
        RepoMirrorUrl $mirrorUrl,
        RepoEndpoints $endpoints,
        RepoStats $stats,
        RepoTimestamps $timestamps
    ) {
        $this->beConstructedWith(
            $id,
            $fullName,
            $owner,
            $private = true,
            $defaultBranch,
            $fork = true,
            $parent,
            $description,
            $homepage,
            $language,
            $mirrorUrl,
            $archived = true,
            $endpoints,
            $stats,
            $timestamps
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepo::class);
    }

    public function it_exposes_id(RepoId $id)
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

    public function it_exposes_private()
    {
        $this->getPrivate()->shouldReturn(true);
    }

    public function it_exposes_default_branch(BranchName $defaultBranch)
    {
        $this->getDefaultBranch()->shouldReturn($defaultBranch);
    }

    public function it_exposes_fork()
    {
        $this->getFork()->shouldReturn(true);
    }

    public function it_exposes_parent(RepoParent $parent)
    {
        $this->getParent()->shouldReturn($parent);
    }

    public function it_exposes_description(RepoDescription $description)
    {
        $this->getDescription()->shouldReturn($description);
    }

    public function it_exposes_homepage(RepoHomepage $homepage)
    {
        $this->getHomepage()->shouldReturn($homepage);
    }

    public function it_exposes_language(RepoLanguage $language)
    {
        $this->getLanguage()->shouldReturn($language);
    }

    public function it_exposes_mirror_url(RepoMirrorUrl $mirrorUrl)
    {
        $this->getMirrorUrl()->shouldReturn($mirrorUrl);
    }

    public function it_exposes_archived()
    {
        $this->getArchived()->shouldReturn(true);
    }

    public function it_exposes_endpoints(RepoEndpoints $endpoints)
    {
        $this->getEndpoints()->shouldReturn($endpoints);
    }

    public function it_exposes_stats(RepoStats $stats)
    {
        $this->getStats()->shouldReturn($stats);
    }

    public function it_exposes_timestamps(RepoTimestamps $timestamps)
    {
        $this->getTimestamps()->shouldReturn($timestamps);
    }

    public function it_can_be_serialized(
        RepoId $id,
        RepoFullName $fullName,
        RepoOwner $owner,
        BranchName $defaultBranch,
        RepoParent $parent,
        RepoDescription $description,
        RepoHomepage $homepage,
        RepoLanguage $language,
        RepoMirrorUrl $mirrorUrl,
        RepoEndpoints $endpoints,
        RepoStats $stats,
        RepoTimestamps $timestamps
    ) {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $fullName->serialize()->shouldBeCalled()->willReturn(['owner' => 'value', 'repoName' => 'name']);
        $owner->serialize()->shouldBeCalled()->willReturn(
            [
                'userId'     => 1,
                'login'      => 'value',
                'type'       => 'type',
                'avatarUrl'  => 'avatarUrl',
                'gravatarId' => 'id',
                'htmlUrl'    => 'htmlUrl',
                'apiUrl'     => 'apiUrl',
                'siteAdmin'  => true,
            ]
        );
        $defaultBranch->serialize()->shouldBeCalled()->willReturn('name');
        $parent->serialize()->shouldBeCalled()->willReturn(['id' => 1, 'fullName' => ['owner' => 'value', 'repoName' => 'name']]);
        $description->serialize()->shouldBeCalled()->willReturn('description');
        $homepage->serialize()->shouldBeCalled()->willReturn('homepage');
        $language->serialize()->shouldBeCalled()->willReturn('language');
        $mirrorUrl->serialize()->shouldBeCalled()->willReturn('mirrorUrl');
        $endpoints->serialize()->shouldBeCalled()->willReturn(['htmlUrl' => 'htmlUrl', 'apiUrl' => 'apiUrl', 'gitUrl' => 'gitUrl', 'sshUrl' => 'sshUrl']);
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
        $timestamps->serialize()->shouldBeCalled()->willReturn(
            [
                'createdAt' => '2018-01-01T00:01:00+00:00',
                'updatedAt' => '2018-01-01T00:01:00+00:00',
                'pushedAt'  => '2018-01-01T00:01:00+00:00',
            ]
        );
        $this->serialize()->shouldReturn(
            [
                'id'       => 1,
                'fullName' => ['owner' => 'value', 'repoName' => 'name'],
                'owner'    => [
                    'userId'     => 1,
                    'login'      => 'value',
                    'type'       => 'type',
                    'avatarUrl'  => 'avatarUrl',
                    'gravatarId' => 'id',
                    'htmlUrl'    => 'htmlUrl',
                    'apiUrl'     => 'apiUrl',
                    'siteAdmin'  => true,
                ],
                'private'       => true,
                'defaultBranch' => 'name',
                'fork'          => true,
                'parent'        => ['id' => 1, 'fullName' => ['owner' => 'value', 'repoName' => 'name']],
                'description'   => 'description',
                'homepage'      => 'homepage',
                'language'      => 'language',
                'mirrorUrl'     => 'mirrorUrl',
                'archived'      => true,
                'endpoints'     => ['htmlUrl' => 'htmlUrl', 'apiUrl' => 'apiUrl', 'gitUrl' => 'gitUrl', 'sshUrl' => 'sshUrl'],
                'stats'         => [
                    'networkCount'     => 1,
                    'watchersCount'    => 1,
                    'stargazersCount'  => 1,
                    'subscribersCount' => 1,
                    'openIssuesCount'  => 1,
                    'size'             => 1,
                ],
                'timestamps' => [
                    'createdAt' => '2018-01-01T00:01:00+00:00',
                    'updatedAt' => '2018-01-01T00:01:00+00:00',
                    'pushedAt'  => '2018-01-01T00:01:00+00:00',
                ],
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'id'       => 1,
            'fullName' => ['owner' => 'value', 'repoName' => 'name'],
            'owner'    => [
                'userId'     => 1,
                'login'      => 'value',
                'type'       => 'type',
                'avatarUrl'  => 'avatarUrl',
                'gravatarId' => 'id',
                'htmlUrl'    => 'htmlUrl',
                'apiUrl'     => 'apiUrl',
                'siteAdmin'  => true,
            ],
            'private'       => true,
            'defaultBranch' => 'name',
            'fork'          => true,
            'parent'        => ['id' => 1, 'fullName' => ['owner' => 'value', 'repoName' => 'name']],
            'description'   => 'description',
            'homepage'      => 'homepage',
            'language'      => 'language',
            'mirrorUrl'     => 'mirrorUrl',
            'archived'      => true,
            'endpoints'     => ['htmlUrl' => 'htmlUrl', 'apiUrl' => 'apiUrl', 'gitUrl' => 'gitUrl', 'sshUrl' => 'sshUrl'],
            'stats'         => [
                'networkCount'     => 1,
                'watchersCount'    => 1,
                'stargazersCount'  => 1,
                'subscribersCount' => 1,
                'openIssuesCount'  => 1,
                'size'             => 1,
            ],
            'timestamps' => [
                'createdAt' => '2018-01-01T00:01:00+00:00',
                'updatedAt' => '2018-01-01T00:01:00+00:00',
                'pushedAt'  => '2018-01-01T00:01:00+00:00',
            ],
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubRepo::class);
    }
}
