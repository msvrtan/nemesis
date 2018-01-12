<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoId;
use DevboardLib\GitHub\Repo\RepoName;
use DevboardLib\GitHub\Repo\RepoParent;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoParent
 * @group  todo
 */
class RepoParentTest extends TestCase
{
    /** @var RepoId */
    private $id;

    /** @var RepoFullName */
    private $fullName;

    /** @var RepoParent */
    private $sut;

    public function setUp()
    {
        $this->id       = new RepoId(1);
        $this->fullName = new RepoFullName(new AccountLogin('value'), new RepoName('name'));
        $this->sut      = new RepoParent($this->id, $this->fullName);
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetFullName()
    {
        self::assertSame($this->fullName, $this->sut->getFullName());
    }

    public function testSerialize()
    {
        $expected = [
            'id'       => 1,
            'fullName' => ['owner' => 'value', 'repoName' => 'name'],
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, RepoParent::deserialize(json_decode($serialized, true)));
    }
}
