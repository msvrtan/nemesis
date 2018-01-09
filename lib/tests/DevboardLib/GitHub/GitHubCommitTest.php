<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Generix\GravatarId;
use DevboardLib\Git\Commit\Author\AuthorName;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\Git\Commit\CommitMessage;
use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\Git\Commit\Committer\CommitterName;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Commit\CommitApiUrl;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitCommitterDetails;
use DevboardLib\GitHub\Commit\CommitHtmlUrl;
use DevboardLib\GitHub\Commit\CommitParent;
use DevboardLib\GitHub\Commit\CommitParent\ParentApiUrl;
use DevboardLib\GitHub\Commit\CommitParent\ParentHtmlUrl;
use DevboardLib\GitHub\Commit\CommitParentCollection;
use DevboardLib\GitHub\Commit\CommitTree;
use DevboardLib\GitHub\Commit\CommitVerification;
use DevboardLib\GitHub\Commit\Tree\TreeApiUrl;
use DevboardLib\GitHub\Commit\Verification\VerificationPayload;
use DevboardLib\GitHub\Commit\Verification\VerificationReason;
use DevboardLib\GitHub\Commit\Verification\VerificationSignature;
use DevboardLib\GitHub\Commit\Verification\VerificationVerified;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubCommit
 * @group  todo
 */
class GitHubCommitTest extends TestCase
{
    /** @var CommitSha */
    private $sha;

    /** @var CommitMessage */
    private $message;

    /** @var CommitDate */
    private $commitDate;

    /** @var CommitAuthor */
    private $author;

    /** @var CommitCommitter */
    private $committer;

    /** @var CommitTree */
    private $tree;

    /** @var CommitParentCollection */
    private $parents;

    /** @var CommitVerification|null */
    private $verification;

    /** @var CommitApiUrl */
    private $apiUrl;

    /** @var CommitHtmlUrl */
    private $htmlUrl;

    /** @var GitHubCommit */
    private $sut;

    public function setUp()
    {
        $this->sha        = new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3');
        $this->message    = new CommitMessage('A commit message');
        $this->commitDate = new CommitDate('2018-01-02T11:12:13+00:00');
        $this->author     = new CommitAuthor(
            new AuthorName('Amy Johnson'),
            new EmailAddress('amy@example.com'),
            new CommitDate('2018-01-02T11:12:13+00:00'),
            new CommitAuthorDetails(
                new UserId(1),
                new UserLogin('value'),
                new AccountType('type'),
                new UserAvatarUrl('avatarUrl'),
                new GravatarId('205e460b479e2e5b48aec07710c08d50'),
                new UserHtmlUrl('htmlUrl'),
                new UserApiUrl('apiUrl'),
                true
            )
        );
        $this->committer = new CommitCommitter(
            new CommitterName('Amy Johnson'),
            new EmailAddress('amy@example.com'),
            new CommitDate('2018-01-02T11:12:13+00:00'),
            new CommitCommitterDetails(
                new UserId(1),
                new UserLogin('value'),
                new AccountType('type'),
                new UserAvatarUrl('avatarUrl'),
                new GravatarId('205e460b479e2e5b48aec07710c08d50'),
                new UserHtmlUrl('htmlUrl'),
                new UserApiUrl('apiUrl'),
                true
            )
        );
        $this->tree = new CommitTree(
            new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'), new TreeApiUrl('apiUrl')
        );
        $this->parents = new CommitParentCollection(
            [
                new CommitParent(
                    new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'),
                    new ParentApiUrl('apiUrl'),
                    new ParentHtmlUrl('htmlUrl')
                ),
            ]
        );
        $this->verification = new CommitVerification(
            new VerificationVerified(true),
            new VerificationReason('reason'),
            new VerificationSignature('signature'),
            new VerificationPayload('payload')
        );
        $this->apiUrl  = new CommitApiUrl('apiUrl');
        $this->htmlUrl = new CommitHtmlUrl('htmlUrl');
        $this->sut     = new GitHubCommit(
            $this->sha,
            $this->message,
            $this->commitDate,
            $this->author,
            $this->committer,
            $this->tree,
            $this->parents,
            $this->verification,
            $this->apiUrl,
            $this->htmlUrl
        );
    }

    public function testGetSha()
    {
        self::assertSame($this->sha, $this->sut->getSha());
    }

    public function testGetMessage()
    {
        self::assertSame($this->message, $this->sut->getMessage());
    }

    public function testGetCommitDate()
    {
        self::assertSame($this->commitDate, $this->sut->getCommitDate());
    }

    public function testGetAuthor()
    {
        self::assertSame($this->author, $this->sut->getAuthor());
    }

    public function testGetCommitter()
    {
        self::assertSame($this->committer, $this->sut->getCommitter());
    }

    public function testGetTree()
    {
        self::assertSame($this->tree, $this->sut->getTree());
    }

    public function testGetParents()
    {
        self::assertSame($this->parents, $this->sut->getParents());
    }

    public function testGetVerification()
    {
        self::assertSame($this->verification, $this->sut->getVerification());
    }

    public function testGetApiUrl()
    {
        self::assertSame($this->apiUrl, $this->sut->getApiUrl());
    }

    public function testGetHtmlUrl()
    {
        self::assertSame($this->htmlUrl, $this->sut->getHtmlUrl());
    }

    public function testHasVerification()
    {
        self::assertTrue($this->sut->hasVerification());
    }

    public function testSerialize()
    {
        $expected = [
            'sha'        => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3',
            'message'    => 'A commit message',
            'commitDate' => '2018-01-02T11:12:13+00:00',
            'author'     => [
                'name'          => 'Amy Johnson',
                'email'         => 'amy@example.com',
                'commitDate'    => '2018-01-02T11:12:13+00:00',
                'authorDetails' => [
                    'userId'     => 1,
                    'login'      => 'value',
                    'type'       => 'type',
                    'avatarUrl'  => 'avatarUrl',
                    'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                    'htmlUrl'    => 'htmlUrl',
                    'apiUrl'     => 'apiUrl',
                    'siteAdmin'  => true,
                ],
            ],
            'committer' => [
                'name'             => 'Amy Johnson',
                'email'            => 'amy@example.com',
                'commitDate'       => '2018-01-02T11:12:13+00:00',
                'committerDetails' => [
                    'userId'     => 1,
                    'login'      => 'value',
                    'type'       => 'type',
                    'avatarUrl'  => 'avatarUrl',
                    'gravatarId' => '205e460b479e2e5b48aec07710c08d50',
                    'htmlUrl'    => 'htmlUrl',
                    'apiUrl'     => 'apiUrl',
                    'siteAdmin'  => true,
                ],
            ],
            'tree'    => ['sha' => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3', 'apiUrl' => 'apiUrl'],
            'parents' => [
                ['sha' => 'e54c3c97b4024b4a9b270b62921c6b830d780bd3', 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl'],
            ],
            'verification' => [
                'verified'  => true,
                'reason'    => 'reason',
                'signature' => 'signature',
                'payload'   => 'payload',
            ],
            'apiUrl'  => 'apiUrl',
            'htmlUrl' => 'htmlUrl',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubCommit::deserialize(json_decode($serialized, true)));
    }
}
