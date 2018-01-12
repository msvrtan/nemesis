<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DateTime;
use DevboardLib\GitHub\External\ExternalService;
use DevboardLib\GitHub\GitHubStatus;
use DevboardLib\GitHub\Status\StatusContext;
use DevboardLib\GitHub\Status\StatusCreator;
use DevboardLib\GitHub\Status\StatusDescription;
use DevboardLib\GitHub\Status\StatusId;
use DevboardLib\GitHub\Status\StatusState;
use DevboardLib\GitHub\Status\StatusTargetUrl;
use PhpSpec\ObjectBehavior;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubStatusSpec extends ObjectBehavior
{
    public function let(
        StatusId $id,
        StatusState $state,
        StatusDescription $description,
        StatusTargetUrl $targetUrl,
        StatusContext $context,
        ExternalService $externalService,
        StatusCreator $creator,
        DateTime $createdAt,
        DateTime $updatedAt
    ) {
        $this->beConstructedWith(
            $id, $state, $description, $targetUrl, $context, $externalService, $creator, $createdAt, $updatedAt
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubStatus::class);
    }

    public function it_exposes_id(StatusId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_state(StatusState $state)
    {
        $this->getState()->shouldReturn($state);
    }

    public function it_exposes_description(StatusDescription $description)
    {
        $this->getDescription()->shouldReturn($description);
    }

    public function it_exposes_target_url(StatusTargetUrl $targetUrl)
    {
        $this->getTargetUrl()->shouldReturn($targetUrl);
    }

    public function it_exposes_context(StatusContext $context)
    {
        $this->getContext()->shouldReturn($context);
    }

    public function it_exposes_external_service(ExternalService $externalService)
    {
        $this->getExternalService()->shouldReturn($externalService);
    }

    public function it_exposes_creator(StatusCreator $creator)
    {
        $this->getCreator()->shouldReturn($creator);
    }

    public function it_exposes_created_at(DateTime $createdAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
    }

    public function it_exposes_updated_at(DateTime $updatedAt)
    {
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }

    public function it_can_be_serialized(
        StatusId $id,
        StatusState $state,
        StatusDescription $description,
        StatusTargetUrl $targetUrl,
        StatusContext $context,
        ExternalService $externalService,
        StatusCreator $creator,
        DateTime $createdAt,
        DateTime $updatedAt
    ) {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $state->serialize()->shouldBeCalled()->willReturn('value');
        $description->serialize()->shouldBeCalled()->willReturn('value');
        $targetUrl->serialize()->shouldBeCalled()->willReturn(
            'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link&utm_medium=referral&utm_source=github-build-link'
        );
        $context->serialize()->shouldBeCalled()->willReturn('ci/circleci');
        $externalService->serialize()->shouldBeCalled()->willReturn('value');
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
        $createdAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $updatedAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn(
            [
                'id'              => 1,
                'state'           => 'value',
                'description'     => 'value',
                'targetUrl'       => 'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link&utm_medium=referral&utm_source=github-build-link',
                'context'         => 'ci/circleci',
                'externalService' => 'value',
                'creator'         => [
                    'userId'     => 1,
                    'login'      => 'value',
                    'type'       => 'type',
                    'avatarUrl'  => 'avatarUrl',
                    'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                    'htmlUrl'    => 'htmlUrl',
                    'apiUrl'     => 'apiUrl',
                    'siteAdmin'  => true,
                ],
                'createdAt' => '2018-01-01T00:01:00+00:00',
                'updatedAt' => '2018-01-01T00:01:00+00:00',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'id'              => 1,
            'state'           => 'value',
            'description'     => 'value',
            'targetUrl'       => 'https://circleci.com/gh/msvrtan/generator/231?utm_campaign=vcs-integration-link&utm_medium=referral&utm_source=github-build-link',
            'context'         => 'ci/circleci',
            'externalService' => 'value',
            'creator'         => [
                'userId'     => 1,
                'login'      => 'value',
                'type'       => 'type',
                'avatarUrl'  => 'avatarUrl',
                'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                'htmlUrl'    => 'htmlUrl',
                'apiUrl'     => 'apiUrl',
                'siteAdmin'  => true,
            ],
            'createdAt' => '2018-01-01T00:01:00+00:00',
            'updatedAt' => '2018-01-01T00:01:00+00:00',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubStatus::class);
    }
}
