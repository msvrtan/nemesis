<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Generix\GravatarId;
use DevboardLib\Git\Branch\BranchName;
use DevboardLib\Git\Commit\Author\AuthorName;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\Git\Commit\CommitMessage;
use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\Git\Commit\Committer\CommitterName;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Branch\BranchProtectionUrl;
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
use DevboardLib\GitHub\GitHubBranch;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoName;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\GitHubBranch
 * @group  todo
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubBranchTest extends TestCase
{
    /** @var RepoFullName */
    private $repoFullName;

    /** @var BranchName */
    private $name;

    /** @var GitHubCommit */
    private $commit;

    /** @var bool|null */
    private $protected;

    /** @var BranchProtectionUrl|null */
    private $protectionUrl;

    /** @var GitHubBranch */
    private $sut;

    public function setUp()
    {
        $this->repoFullName = new RepoFullName(new AccountLogin('value'), new RepoName('name'));
        $this->name         = new BranchName('master');
        $this->commit       = new GitHubCommit(
            new CommitSha('sha'),
            new CommitMessage('message'),
            new CommitDate('2018-01-01T00:01:00+00:00'),
            new CommitAuthor(
                new AuthorName('name'),
                new EmailAddress('value'),
                new CommitDate('2018-01-01T00:01:00+00:00'),
                new CommitAuthorDetails(
                    new UserId(1),
                    new UserLogin('value'),
                    new AccountType('type'),
                    new UserAvatarUrl('avatarUrl'),
                    new GravatarId('id'),
                    new UserHtmlUrl('htmlUrl'),
                    new UserApiUrl('apiUrl'),
                    true
                )
            ),
            new CommitCommitter(
                new CommitterName('name'),
                new EmailAddress('value'),
                new CommitDate('2018-01-01T00:01:00+00:00'),
                new CommitCommitterDetails(
                    new UserId(1),
                    new UserLogin('value'),
                    new AccountType('type'),
                    new UserAvatarUrl('avatarUrl'),
                    new GravatarId('id'),
                    new UserHtmlUrl('htmlUrl'),
                    new UserApiUrl('apiUrl'),
                    true
                )
            ),
            new CommitTree(new CommitSha('sha'), new TreeApiUrl('apiUrl')),
            new CommitParentCollection([new CommitParent(new CommitSha('sha'), new ParentApiUrl('apiUrl'), new ParentHtmlUrl('htmlUrl'))]),
            new CommitVerification(
                new VerificationVerified(true),
                new VerificationReason('reason'),
                new VerificationSignature('signature'),
                new VerificationPayload('payload')
            ),
            new CommitApiUrl('apiUrl'),
            new CommitHtmlUrl('htmlUrl')
        );
        $this->protected     = false;
        $this->protectionUrl = new BranchProtectionUrl('protectionUrl');
        $this->sut           = new GitHubBranch($this->repoFullName, $this->name, $this->commit, $this->protected, $this->protectionUrl);
    }

    public function testGetRepoFullName()
    {
        self::assertSame($this->repoFullName, $this->sut->getRepoFullName());
    }

    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testGetCommit()
    {
        self::assertSame($this->commit, $this->sut->getCommit());
    }

    public function testGetProtected()
    {
        self::assertSame($this->protected, $this->sut->getProtected());
    }

    public function testGetProtectionUrl()
    {
        self::assertSame($this->protectionUrl, $this->sut->getProtectionUrl());
    }

    public function testSerialize()
    {
        $expected = [
            'repoFullName' => ['owner' => 'value', 'repoName' => 'name'],
            'name'         => 'master',
            'commit'       => [
                'sha'        => 'sha',
                'message'    => 'message',
                'commitDate' => '2018-01-01T00:01:00+00:00',
                'author'     => [
                    'name'          => 'name',
                    'email'         => 'value',
                    'commitDate'    => '2018-01-01T00:01:00+00:00',
                    'authorDetails' => [
                        'userId'     => 1,
                        'login'      => 'value',
                        'type'       => 'type',
                        'avatarUrl'  => 'avatarUrl',
                        'gravatarId' => 'id',
                        'htmlUrl'    => 'htmlUrl',
                        'apiUrl'     => 'apiUrl',
                        'siteAdmin'  => true,
                    ],
                ],
                'committer' => [
                    'name'             => 'name',
                    'email'            => 'value',
                    'commitDate'       => '2018-01-01T00:01:00+00:00',
                    'committerDetails' => [
                        'userId'     => 1,
                        'login'      => 'value',
                        'type'       => 'type',
                        'avatarUrl'  => 'avatarUrl',
                        'gravatarId' => 'id',
                        'htmlUrl'    => 'htmlUrl',
                        'apiUrl'     => 'apiUrl',
                        'siteAdmin'  => true,
                    ],
                ],
                'tree'         => ['sha' => 'sha', 'apiUrl' => 'apiUrl'],
                'parents'      => [['sha' => 'sha', 'apiUrl' => 'apiUrl', 'htmlUrl' => 'htmlUrl']],
                'verification' => ['verified' => true, 'reason' => 'reason', 'signature' => 'signature', 'payload' => 'payload'],
                'apiUrl'       => 'apiUrl',
                'htmlUrl'      => 'htmlUrl',
            ],
            'protected'     => false,
            'protectionUrl' => 'protectionUrl',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, GitHubBranch::deserialize(json_decode($serialized, true)));
    }
}
