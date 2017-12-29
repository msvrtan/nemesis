<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model;

use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\RepositoryConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\RepositoryConstructorMethod
 * @group  nemesis
 */
class RepositoryConstructorMethodTest extends TestCase
{
    /** @var RepositoryConstructorMethod */
    private $repositoryConstructorMethod;

    public function setUp(): void
    {
        $this->repositoryConstructorMethod = new RepositoryConstructorMethod(new ClassDefinition('name', 'namespace'));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
