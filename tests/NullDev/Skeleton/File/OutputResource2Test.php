<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\File;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Skeleton\File\OutputResource2;
use NullDevelopment\PhpStructure\DataTypeName\AbstractDataTypeName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\File\OutputResource2
 * @group  todo
 */
class OutputResource2Test extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var string */
    private $fileName;

    /** @var MockInterface|AbstractDataTypeName */
    private $className;

    /** @var string */
    private $output;

    /** @var OutputResource2 */
    private $sut;

    public function setUp()
    {
        $this->fileName  = 'fileName';
        $this->className = Mockery::mock(AbstractDataTypeName::class);
        $this->output    = 'output';
        $this->sut       = new OutputResource2($this->fileName, $this->className, $this->output);
    }

    public function testGetFileName()
    {
        self::assertEquals($this->fileName, $this->sut->getFileName());
    }

    public function testGetClassName()
    {
        self::assertEquals($this->className, $this->sut->getClassName());
    }

    public function testGetOutput()
    {
        self::assertEquals($this->output, $this->sut->getOutput());
    }
}
