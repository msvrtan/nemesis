<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Git\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Git\Commit\CommitCommitter;
use DevboardLib\Git\Commit\CommitDate;
use DevboardLib\Git\Commit\Committer\CommitterName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Git\Commit\CommitCommitter
 * @group  todo
 */
class CommitCommitterTest extends TestCase
{
    /** @var CommitterName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $commitDate;

    /** @var CommitCommitter */
    private $sut;

    public function setUp()
    {
        $this->name       = new CommitterName('Jane Johnson');
        $this->email      = new EmailAddress('jane@example.com');
        $this->commitDate = new CommitDate('2018-01-02T20:21:22+00:00');
        $this->sut        = new CommitCommitter($this->name, $this->email, $this->commitDate);
    }

    public function testGetName()
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testGetEmail()
    {
        self::assertSame($this->email, $this->sut->getEmail());
    }

    public function testGetCommitDate()
    {
        self::assertSame($this->commitDate, $this->sut->getCommitDate());
    }

    public function testSerialize()
    {
        $expected = [
            'name'       => 'Jane Johnson',
            'email'      => 'jane@example.com',
            'commitDate' => '2018-01-02T20:21:22+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitCommitter::deserialize(json_decode($serialized, true)));
    }
}
