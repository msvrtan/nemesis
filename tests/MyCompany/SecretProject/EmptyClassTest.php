<?php

declare(strict_types=1);

namespace tests\MyCompany\SecretProject;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use MyCompany\SecretProject\EmptyClass;
use PHPUnit_Framework_TestCase;

/**
 * @covers \MyCompany\SecretProject\EmptyClass
 * @group  todo
 */
class EmptyClassTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var EmptyClass */
    private $emptyClass;

    public function setUp()
    {
        $this->emptyClass = new EmptyClass();
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}