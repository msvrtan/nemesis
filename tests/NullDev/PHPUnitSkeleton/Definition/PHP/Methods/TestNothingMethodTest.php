<?php

declare(strict_types=1);

namespace Tests\NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestNothingMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestNothingMethod
 * @group  nemesis
 */
class TestNothingMethodTest extends TestCase
{
    /** @var TestNothingMethod */
    private $testNothingMethod;

    public function setUp(): void
    {
        $this->testNothingMethod = new TestNothingMethod(new ImprovedClassSource(new ClassDefinition('name', 'namespace')));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
