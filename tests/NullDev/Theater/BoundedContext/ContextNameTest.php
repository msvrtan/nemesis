<?php

declare(strict_types=1);

namespace tests\NullDev\Theater\BoundedContext;

use Exception;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Theater\BoundedContext\ContextName;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Theater\BoundedContext\ContextName
 * @group  todo
 */
class ContextNameTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $name;
    /** @var ContextName */
    private $contextName;

    public function setUp()
    {
        $this->name        = 'name';
        $this->contextName = new ContextName($this->name);
    }

    public function testGetValue()
    {
        self::assertEquals($this->name, $this->contextName->getValue());
    }

    public function testToString()
    {
        self::assertEquals($this->name, $this->contextName->__toString());
    }

    /**
     * @dataProvider provideBadContextNames
     */
    public function testDoesntAcceptName(string $name, string $expectedExceptionMessage)
    {
        self::expectException(Exception::class);
        self::expectExceptionMessage($expectedExceptionMessage);

        new ContextName($name);
    }

    public function provideBadContextNames(): array
    {
        return [
            ['', 'Name should not be empty.'],
            ['Something\User', 'Name can use only alphanumeric characters.'],
            ['Something/User', 'Name can use only alphanumeric characters.'],
        ];
    }
}