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
use DevboardLib\GitHub\GitHubBranchCollection;
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
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\GitHubBranchCollection
 * @group  todo
 */
class GitHubBranchCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var GitHubBranchCollection */
    private $sut;

    public function setUp()
    {
        $this->elements = [
            new GitHubBranch(
                new RepoFullName(new AccountLogin('value'), new RepoName('name')),
                new BranchName('production'),
                new GitHubCommit(
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
                ),
                true,
                new BranchProtectionUrl('protectionUrl')
            ),
        ];
        $this->sut = new GitHubBranchCollection($this->elements);
    }

    public function testGetElements()
    {
        self::assertSame($this->elements, $this->sut->toArray());
    }

    public function testSerializeAndDeserialize()
    {
        $serialized     = $this->sut->serialize();
        $serializedJson = json_encode($serialized);
        self::assertEquals($this->sut, $this->sut->deserialize(json_decode($serializedJson, true)));
    }
}
