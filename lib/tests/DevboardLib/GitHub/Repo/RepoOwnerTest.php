<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Repo;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Repo\RepoOwner;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoOwner
 * @group  todo
 */
class RepoOwnerTest extends TestCase
{
    /** @var AccountId */
    private $id;

    /** @var AccountLogin */
    private $login;

    /** @var AccountType */
    private $type;

    /** @var AccountAvatarUrl */
    private $avatarUrl;

    /** @var GravatarId */
    private $gravatarId;

    /** @var AccountHtmlUrl */
    private $htmlUrl;

    /** @var AccountApiUrl */
    private $apiUrl;

    /** @var bool */
    private $siteAdmin;

    /** @var RepoOwner */
    private $sut;

    public function setUp()
    {
        $this->id         = new AccountId(583231);
        $this->login      = new AccountLogin('octocat');
        $this->type       = new AccountType('User');
        $this->avatarUrl  = new AccountAvatarUrl('https://avatars3.githubusercontent.com/u/583231?v=4');
        $this->gravatarId = new GravatarId('');
        $this->htmlUrl    = new AccountHtmlUrl('https://github.com/octocat');
        $this->apiUrl     = new AccountApiUrl('https://api.github.com/users/octocat');
        $this->siteAdmin  = false;
        $this->sut        = new RepoOwner(
            $this->id,
            $this->login,
            $this->type,
            $this->avatarUrl,
            $this->gravatarId,
            $this->htmlUrl,
            $this->apiUrl,
            $this->siteAdmin
        );
    }

    public function testGetId()
    {
        self::assertSame($this->id, $this->sut->getId());
    }

    public function testGetLogin()
    {
        self::assertSame($this->login, $this->sut->getLogin());
    }

    public function testGetType()
    {
        self::assertSame($this->type, $this->sut->getType());
    }

    public function testGetAvatarUrl()
    {
        self::assertSame($this->avatarUrl, $this->sut->getAvatarUrl());
    }

    public function testGetGravatarId()
    {
        self::assertSame($this->gravatarId, $this->sut->getGravatarId());
    }

    public function testGetHtmlUrl()
    {
        self::assertSame($this->htmlUrl, $this->sut->getHtmlUrl());
    }

    public function testGetApiUrl()
    {
        self::assertSame($this->apiUrl, $this->sut->getApiUrl());
    }

    public function testGetSiteAdmin()
    {
        self::assertSame($this->siteAdmin, $this->sut->getSiteAdmin());
    }

    public function testSerialize()
    {
        $expected = [
            'id'         => 583231,
            'login'      => 'octocat',
            'type'       => 'User',
            'avatarUrl'  => 'https://avatars3.githubusercontent.com/u/583231?v=4',
            'gravatarId' => '',
            'htmlUrl'    => 'https://github.com/octocat',
            'apiUrl'     => 'https://api.github.com/users/octocat',
            'siteAdmin'  => false,
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, RepoOwner::deserialize(json_decode($serialized, true)));
    }
}