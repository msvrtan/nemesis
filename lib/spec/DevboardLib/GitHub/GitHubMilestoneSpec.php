<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\GitHubMilestone;
use DevboardLib\GitHub\Milestone\MilestoneApiUrl;
use DevboardLib\GitHub\Milestone\MilestoneClosedAt;
use DevboardLib\GitHub\Milestone\MilestoneCreatedAt;
use DevboardLib\GitHub\Milestone\MilestoneCreator;
use DevboardLib\GitHub\Milestone\MilestoneDescription;
use DevboardLib\GitHub\Milestone\MilestoneDueOn;
use DevboardLib\GitHub\Milestone\MilestoneHtmlUrl;
use DevboardLib\GitHub\Milestone\MilestoneId;
use DevboardLib\GitHub\Milestone\MilestoneNumber;
use DevboardLib\GitHub\Milestone\MilestoneState;
use DevboardLib\GitHub\Milestone\MilestoneTitle;
use DevboardLib\GitHub\Milestone\MilestoneUpdatedAt;
use PhpSpec\ObjectBehavior;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubMilestoneSpec extends ObjectBehavior
{
    public function let(
        MilestoneId $id,
        MilestoneTitle $title,
        MilestoneDescription $description,
        MilestoneDueOn $dueOn,
        MilestoneState $state,
        MilestoneNumber $number,
        MilestoneCreator $creator,
        MilestoneHtmlUrl $htmlUrl,
        MilestoneApiUrl $apiUrl,
        MilestoneClosedAt $closedAt,
        MilestoneCreatedAt $createdAt,
        MilestoneUpdatedAt $updatedAt
    ) {
        $this->beConstructedWith(
            $id,
            $title,
            $description,
            $dueOn,
            $state,
            $number,
            $creator,
            $htmlUrl,
            $apiUrl,
            $closedAt,
            $createdAt,
            $updatedAt
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubMilestone::class);
    }

    public function it_exposes_id(MilestoneId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_title(MilestoneTitle $title)
    {
        $this->getTitle()->shouldReturn($title);
    }

    public function it_exposes_description(MilestoneDescription $description)
    {
        $this->getDescription()->shouldReturn($description);
    }

    public function it_exposes_due_on(MilestoneDueOn $dueOn)
    {
        $this->getDueOn()->shouldReturn($dueOn);
    }

    public function it_exposes_state(MilestoneState $state)
    {
        $this->getState()->shouldReturn($state);
    }

    public function it_exposes_number(MilestoneNumber $number)
    {
        $this->getNumber()->shouldReturn($number);
    }

    public function it_exposes_creator(MilestoneCreator $creator)
    {
        $this->getCreator()->shouldReturn($creator);
    }

    public function it_exposes_html_url(MilestoneHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }

    public function it_exposes_api_url(MilestoneApiUrl $apiUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
    }

    public function it_exposes_closed_at(MilestoneClosedAt $closedAt)
    {
        $this->getClosedAt()->shouldReturn($closedAt);
    }

    public function it_exposes_created_at(MilestoneCreatedAt $createdAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
    }

    public function it_exposes_updated_at(MilestoneUpdatedAt $updatedAt)
    {
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }

    public function it_has_closed_at()
    {
        $this->hasClosedAt()->shouldReturn(true);
    }

    public function it_can_be_serialized(
        MilestoneId $id,
        MilestoneTitle $title,
        MilestoneDescription $description,
        MilestoneDueOn $dueOn,
        MilestoneState $state,
        MilestoneNumber $number,
        MilestoneCreator $creator,
        MilestoneHtmlUrl $htmlUrl,
        MilestoneApiUrl $apiUrl,
        MilestoneClosedAt $closedAt,
        MilestoneCreatedAt $createdAt,
        MilestoneUpdatedAt $updatedAt
    ) {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $title->serialize()->shouldBeCalled()->willReturn('value');
        $description->serialize()->shouldBeCalled()->willReturn('value');
        $dueOn->serialize()->shouldBeCalled()->willReturn('2016-08-02T17:35:14+00:00');
        $state->serialize()->shouldBeCalled()->willReturn('closed');
        $number->serialize()->shouldBeCalled()->willReturn(1);
        $creator->serialize()->shouldBeCalled()->willReturn(
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
        $htmlUrl->serialize()->shouldBeCalled()->willReturn('htmlUrl');
        $apiUrl->serialize()->shouldBeCalled()->willReturn('apiUrl');
        $closedAt->serialize()->shouldBeCalled()->willReturn('2016-08-02T17:35:14+00:00');
        $createdAt->serialize()->shouldBeCalled()->willReturn('2016-08-02T17:35:14+00:00');
        $updatedAt->serialize()->shouldBeCalled()->willReturn('2016-08-02T17:35:14+00:00');
        $this->serialize()->shouldReturn(
            [
                'id'          => 1,
                'title'       => 'value',
                'description' => 'value',
                'dueOn'       => '2016-08-02T17:35:14+00:00',
                'state'       => 'closed',
                'number'      => 1,
                'creator'     => [
                    'userId'     => 1,
                    'login'      => 'value',
                    'type'       => 'type',
                    'avatarUrl'  => 'avatarUrl',
                    'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                    'htmlUrl'    => 'htmlUrl',
                    'apiUrl'     => 'apiUrl',
                    'siteAdmin'  => true,
                ],
                'htmlUrl'   => 'htmlUrl',
                'apiUrl'    => 'apiUrl',
                'closedAt'  => '2016-08-02T17:35:14+00:00',
                'createdAt' => '2016-08-02T17:35:14+00:00',
                'updatedAt' => '2016-08-02T17:35:14+00:00',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'id'          => 1,
            'title'       => 'value',
            'description' => 'value',
            'dueOn'       => '2016-08-02T17:35:14+00:00',
            'state'       => 'closed',
            'number'      => 1,
            'creator'     => [
                'userId'     => 1,
                'login'      => 'value',
                'type'       => 'type',
                'avatarUrl'  => 'avatarUrl',
                'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                'htmlUrl'    => 'htmlUrl',
                'apiUrl'     => 'apiUrl',
                'siteAdmin'  => true,
            ],
            'htmlUrl'   => 'htmlUrl',
            'apiUrl'    => 'apiUrl',
            'closedAt'  => '2016-08-02T17:35:14+00:00',
            'createdAt' => '2016-08-02T17:35:14+00:00',
            'updatedAt' => '2016-08-02T17:35:14+00:00',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubMilestone::class);
    }
}
