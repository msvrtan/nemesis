<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Commit;

use DevboardLib\Git\Commit\CommitSha;
use DevboardLib\GitHub\Commit\CommitParent;
use DevboardLib\GitHub\Commit\CommitParent\ParentApiUrl;
use DevboardLib\GitHub\Commit\CommitParent\ParentHtmlUrl;
use DevboardLib\GitHub\Commit\CommitParentCollection;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class CommitParentCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var CommitParentCollection */
    private $sut;

    public function setUp()
    {
        $this->elements = [new CommitParent(new CommitSha('sha'), new ParentApiUrl('apiUrl'), new ParentHtmlUrl('htmlUrl'))];
        $this->sut      = new CommitParentCollection($this->elements);
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
