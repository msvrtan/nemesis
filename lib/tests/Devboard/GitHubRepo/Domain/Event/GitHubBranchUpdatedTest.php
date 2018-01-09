<?php

declare(strict_types=1);

namespace Tests\Devboard\GitHubRepo\Domain\Event;

use DateTime;
use Devboard\GitHubRepo\Core\GitHubRepoRootId;
use Devboard\GitHubRepo\Domain\Event\GitHubBranchUpdated;
use DevboardLib\Generix\EmailAddress;
use DevboardLib\Generix\GravatarId;
use DevboardLib\Git\Branch\BranchName;
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
 * @covers \Devboard\GitHubRepo\Domain\Event\GitHubBranchUpdated
 * @group  todo
 */
class GitHubBranchUpdatedTest extends TestCase
{
    /** @var GitHubRepoRootId */
    private $id;

    /** @var BranchName */
    private $name;

    /** @var GitHubCommit */
    private $commit;

    /** @var DateTime */
    private $updatedAt;

    /** @var GitHubBranchUpdated */
    private $sut;

    public function setUp()
    {
        $this->id     = new GitHubRepoRootId('R0hSZXBvUm9vdDoxMjM=');
        $this->name   = new BranchName('master');
        $this->commit = new GitHubCommit(
            new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'),
            new CommitMessage('A commit message'),
            new CommitDate('2018-01-02T11:12:13+00:00'),
            new CommitAuthor(
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
            ),
            new CommitCommitter(
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
            ),
            new CommitTree(new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'), new TreeApiUrl('apiUrl')),
            new CommitParentCollection(
                [
                    new CommitParent(
                        new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'),
                        new ParentApiUrl('apiUrl'),
                        new ParentHtmlUrl('htmlUrl')
                    ),
                ]
            ),
            new CommitVerification(
                new VerificationVerified(true),
                new VerificationReason('reason'),
                new VerificationSignature('signature'),
                new VerificationPayload('payload')
            ),
            new CommitApiUrl('apiUrl'),
            new CommitHtmlUrl('htmlUrl')
        );
        $this->updatedAt = new DateTime('2018-01-01T00:01:00+00:00');
        $this->sut       = new GitHubBranchUpdated($this->id, $this->name, $this->commit, $this->updatedAt);
    }

    public function testCreate()
    {
        $id     = new GitHubRepoRootId('R0hSZXBvUm9vdDoxMjM=');
        $name   = new BranchName('master');
        $commit = new GitHubCommit(
            new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'),
            new CommitMessage('A commit message'),
            new CommitDate('2018-01-02T11:12:13+00:00'),
            new CommitAuthor(
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
            ),
            new CommitCommitter(
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
            ),
            new CommitTree(new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'), new TreeApiUrl('apiUrl')),
            new CommitParentCollection(
                [
                    new CommitParent(
                        new CommitSha('e54c3c97b4024b4a9b270b62921c6b830d780bd3'),
                        new ParentApiUrl('apiUrl'),
                        new ParentHtmlUrl('htmlUrl')
                    ),
                ]
            ),
            new CommitVerification(
                new VerificationVerified(true),
                new VerificationReason('reason'),
                new VerificationSignature('signature'),
                new VerificationPayload('payload')
            ),
            new CommitApiUrl('apiUrl'),
            new CommitHtmlUrl('htmlUrl')
        );
        $result = $this->sut->create($id, $name, $commit);
        self::assertInstanceOf(GitHubBranchUpdated::class, $result);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testGetCommit()
    {
        self::assertSame($this->commit, $this->sut->getCommit());
    }

    public function testGetUpdatedAt()
    {
        self::assertSame($this->updatedAt, $this->sut->getUpdatedAt());
    }

    public function testSerialize()
    {
        $expected = [
            'id'     => 'R0hSZXBvUm9vdDoxMjM=',
            'name'   => 'master',
            'commit' => [
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
            ],
            'updatedAt' => '2018-01-01T00:01:00+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubBranchUpdated::deserialize(json_decode($serialized, true)));
    }
}
