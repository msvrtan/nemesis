<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\GitHubIssueComment;
use DevboardLib\GitHub\Issue\IssueApiUrl;
use DevboardLib\GitHub\Issue\IssueId;
use DevboardLib\GitHub\IssueComment\IssueCommentApiUrl;
use DevboardLib\GitHub\IssueComment\IssueCommentAuthor;
use DevboardLib\GitHub\IssueComment\IssueCommentBody;
use DevboardLib\GitHub\IssueComment\IssueCommentCreatedAt;
use DevboardLib\GitHub\IssueComment\IssueCommentHtmlUrl;
use DevboardLib\GitHub\IssueComment\IssueCommentId;
use DevboardLib\GitHub\IssueComment\IssueCommentUpdatedAt;
use PhpSpec\ObjectBehavior;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubIssueCommentSpec extends ObjectBehavior
{
    public function let(
        IssueCommentId $id,
        IssueId $issueId,
        IssueCommentBody $body,
        IssueCommentAuthor $author,
        IssueCommentHtmlUrl $htmlUrl,
        IssueCommentApiUrl $apiUrl,
        IssueApiUrl $issueApiUrl,
        IssueCommentCreatedAt $createdAt,
        IssueCommentUpdatedAt $updatedAt
    ) {
        $this->beConstructedWith(
            $id, $issueId, $body, $author, $htmlUrl, $apiUrl, $issueApiUrl, $createdAt, $updatedAt
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubIssueComment::class);
    }

    public function it_exposes_id(IssueCommentId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_issue_id(IssueId $issueId)
    {
        $this->getIssueId()->shouldReturn($issueId);
    }

    public function it_exposes_body(IssueCommentBody $body)
    {
        $this->getBody()->shouldReturn($body);
    }

    public function it_exposes_author(IssueCommentAuthor $author)
    {
        $this->getAuthor()->shouldReturn($author);
    }

    public function it_exposes_html_url(IssueCommentHtmlUrl $htmlUrl)
    {
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }

    public function it_exposes_api_url(IssueCommentApiUrl $apiUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
    }

    public function it_exposes_issue_api_url(IssueApiUrl $issueApiUrl)
    {
        $this->getIssueApiUrl()->shouldReturn($issueApiUrl);
    }

    public function it_exposes_created_at(IssueCommentCreatedAt $createdAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
    }

    public function it_exposes_updated_at(IssueCommentUpdatedAt $updatedAt)
    {
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }

    public function it_can_be_serialized(
        IssueCommentId $id,
        IssueId $issueId,
        IssueCommentBody $body,
        IssueCommentAuthor $author,
        IssueCommentHtmlUrl $htmlUrl,
        IssueCommentApiUrl $apiUrl,
        IssueApiUrl $issueApiUrl,
        IssueCommentCreatedAt $createdAt,
        IssueCommentUpdatedAt $updatedAt
    ) {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $issueId->serialize()->shouldBeCalled()->willReturn(1);
        $body->serialize()->shouldBeCalled()->willReturn('value');
        $author->serialize()->shouldBeCalled()->willReturn(
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
        $issueApiUrl->serialize()->shouldBeCalled()->willReturn('apiUrl');
        $createdAt->serialize()->shouldBeCalled()->willReturn('2016-08-02T17:35:14+00:00');
        $updatedAt->serialize()->shouldBeCalled()->willReturn('2016-08-02T17:35:14+00:00');
        $this->serialize()->shouldReturn(
            [
                'id'      => 1,
                'issueId' => 1,
                'body'    => 'value',
                'author'  => [
                    'userId'     => 1,
                    'login'      => 'value',
                    'type'       => 'type',
                    'avatarUrl'  => 'avatarUrl',
                    'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                    'htmlUrl'    => 'htmlUrl',
                    'apiUrl'     => 'apiUrl',
                    'siteAdmin'  => true,
                ],
                'htmlUrl'     => 'htmlUrl',
                'apiUrl'      => 'apiUrl',
                'issueApiUrl' => 'apiUrl',
                'createdAt'   => '2016-08-02T17:35:14+00:00',
                'updatedAt'   => '2016-08-02T17:35:14+00:00',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'id'      => 1,
            'issueId' => 1,
            'body'    => 'value',
            'author'  => [
                'userId'     => 1,
                'login'      => 'value',
                'type'       => 'type',
                'avatarUrl'  => 'avatarUrl',
                'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                'htmlUrl'    => 'htmlUrl',
                'apiUrl'     => 'apiUrl',
                'siteAdmin'  => true,
            ],
            'htmlUrl'     => 'htmlUrl',
            'apiUrl'      => 'apiUrl',
            'issueApiUrl' => 'apiUrl',
            'createdAt'   => '2016-08-02T17:35:14+00:00',
            'updatedAt'   => '2016-08-02T17:35:14+00:00',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(GitHubIssueComment::class);
    }
}
