<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DeserializeMethod;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\Method\DeserializeMethod
 * @group  unit
 */
class DeserializeMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|ClassName */
    private $className;

    /** @var array */
    private $properties;

    /** @var DeserializeMethod */
    private $sut;

    public function setUp()
    {
        $this->className  = Fixtures::userEntity();
        $this->properties = [];
        $this->sut        = new DeserializeMethod($this->className, $this->properties);
    }

    public function testGetClassName()
    {
        self::assertEquals($this->className, $this->sut->getClassName());
    }

    public function testGetProperties()
    {
        self::assertEquals($this->properties, $this->sut->getProperties());
    }

    public function testGetVisibility()
    {
        self::assertEquals(new Visibility('public'), $this->sut->getVisibility());
    }

    public function testGetName()
    {
        self::assertEquals('deserialize', $this->sut->getName());
    }

    public function testGetParameters()
    {
        self::assertEquals(
            [new MethodParameter('data', ClassName::create('array'), false, false, null)],
            $this->sut->getParameters()
        );
    }

    public function testGetReturnType()
    {
        self::assertEquals('self', $this->sut->getReturnType());
    }

    public function testIsNullableReturnType()
    {
        self::assertFalse($this->sut->isNullableReturnType());
    }

    public function testGetImports()
    {
        self::assertEquals([$this->className], $this->sut->getImports());
    }

    public function testIsStatic()
    {
        self::assertTrue($this->sut->isStatic());
    }
}
