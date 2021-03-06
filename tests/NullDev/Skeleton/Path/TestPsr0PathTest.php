<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Path;

use NullDev\Skeleton\Path\TestPsr0Path;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Path\TestPsr0Path
 * @group  unit
 */
class TestPsr0PathTest extends TestCase
{
    /** @var TestPsr0Path */
    private $path;

    public function setUp(): void
    {
        $this->path = new TestPsr0Path('tests/', '');
    }

    public function testItIsTestsCode(): void
    {
        self::assertTrue($this->path->isTestsCode());
        self::assertFalse($this->path->isSourceCode());
        self::assertFalse($this->path->isSpecCode());
    }
}
