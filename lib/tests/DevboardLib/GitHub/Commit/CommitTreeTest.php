<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Commit\CommitTree;
use DevboardLib\GitHub\Commit\Tree\TreeApiUrl;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitTree
 * @group  todo
 */
class CommitTreeTest extends TestCase
{
    /** @var CommitSha */
    private $sha;

    /** @var TreeApiUrl */
    private $url;

    /** @var CommitTree */
    private $sut;

    public function setUp()
    {
        $this->sha = new CommitSha('02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0');
        $this->url = new TreeApiUrl('https://api.github.com/repos/baxterthehacker/public-repo/git/trees/02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0');
        $this->sut = new CommitTree($this->sha, $this->url);
    }

    public function testGetSha()
    {
        self::assertSame($this->sha, $this->sut->getSha());
    }

    public function testGetUrl()
    {
        self::assertSame($this->url, $this->sut->getUrl());
    }

    public function testSerialize()
    {
        $expected = [
            'sha' => '02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0',
            'url' => 'https://api.github.com/repos/baxterthehacker/public-repo/git/trees/02b49ad0ba4f1acd9f06531b21e16a4ac5d341d0',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize()
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitTree::deserialize(json_decode($serialized, true)));
    }
}
