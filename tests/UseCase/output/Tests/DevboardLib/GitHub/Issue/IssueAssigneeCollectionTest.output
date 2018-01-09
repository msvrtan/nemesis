<?php

declare(strict_types=1);

namespace Tests\DevboardLib\GitHub\Issue;

use DevboardLib\Generix\GravatarId;
use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Issue\IssueAssignee;
use DevboardLib\GitHub\Issue\IssueAssigneeCollection;
use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @covers \DevboardLib\GitHub\Issue\IssueAssigneeCollection
 * @group  todo
 */
class IssueAssigneeCollectionTest extends TestCase
{
    /** @var array */
    private $elements = [];

    /** @var IssueAssigneeCollection */
    private $sut;

    public function setUp()
    {
        $this->elements = [
            new IssueAssignee(
                new AccountId(1),
                new AccountLogin('value'),
                new AccountType('type'),
                new AccountAvatarUrl('avatarUrl'),
                new GravatarId('205e460b479e2e5b48aec07710c08d50'),
                new AccountHtmlUrl('htmlUrl'),
                new AccountApiUrl('apiUrl'),
                true
            ),
        ];
        $this->sut = new IssueAssigneeCollection($this->elements);
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
