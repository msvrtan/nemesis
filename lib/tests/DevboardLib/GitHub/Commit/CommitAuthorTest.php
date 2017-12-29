<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Generix\GravatarId;
use DevboardLib\Git\Commit\Author\AuthorName;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitAuthor
 * @group  todo
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class CommitAuthorTest extends TestCase
{
    /** @var AuthorName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $date;

    /** @var CommitAuthorDetails|null */
    private $authorDetails;

    /** @var CommitAuthor */
    private $sut;

    public function setUp()
    {
        $this->name          = new AuthorName('Jane Johnson');
        $this->email         = new EmailAddress('jane@example.com');
        $this->date          = new CommitDate('2018-01-02T20:21:22+00:00');
        $this->authorDetails = new CommitAuthorDetails(
            new UserId(1),
            new UserLogin('login'),
            new AccountType('type'),
            new UserAvatarUrl('avatarUrl'),
            new GravatarId('id'),
            new UserHtmlUrl('htmlUrl'),
            new UserApiUrl('apiUrl'),
            true
        );
        $this->sut = new CommitAuthor($this->name, $this->email, $this->date, $this->authorDetails);
    }

    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testGetEmail()
    {
        self::assertSame($this->email, $this->sut->getEmail());
    }

    public function testGetDate()
    {
        self::assertSame($this->date, $this->sut->getDate());
    }

    public function testGetAuthorDetails()
    {
        self::assertSame($this->authorDetails, $this->sut->getAuthorDetails());
    }

    public function testSerialize()
    {
        $expected = [
            'name'          => 'Jane Johnson',
            'email'         => 'jane@example.com',
            'date'          => '2018-01-02T20:21:22+00:00',
            'authorDetails' => [
                'id'         => 1,
                'login'      => 'login',
                'type'       => 'type',
                'avatarUrl'  => 'avatarUrl',
                'gravatarId' => 'id',
                'htmlUrl'    => 'htmlUrl',
                'apiUrl'     => 'apiUrl',
                'siteAdmin'  => true,
            ],
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitAuthor::deserialize(json_decode($serialized, true)));
    }
}
