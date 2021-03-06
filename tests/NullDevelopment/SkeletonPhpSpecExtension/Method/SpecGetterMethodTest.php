<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecGetterMethod;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\Method\SpecGetterMethod
 * @group  unit
 */
class SpecGetterMethodTest extends TestCase
{
    /** @var string */
    private $name;

    /** @var string */
    private $methodUnderTest;

    /** @var Property */
    private $property;

    /** @var SpecGetterMethod */
    private $sut;

    public function setUp()
    {
        $this->name            = 'it_exposes_first_name';
        $this->methodUnderTest = 'methodUnderTest';
        $this->property        = Fixtures::firstNameProperty();
        $this->sut             = new SpecGetterMethod($this->name, $this->methodUnderTest, $this->property);
    }

    public function testGetMethodUnderTest()
    {
        self::assertEquals($this->methodUnderTest, $this->sut->getMethodUnderTest());
    }

    public function testGetProperty()
    {
        self::assertEquals($this->property, $this->sut->getProperty());
    }

    public function testGetPropertyName()
    {
        self::assertEquals('firstName', $this->sut->getPropertyName());
    }

    public function testGetVisibility()
    {
        self::assertEquals(new Visibility('public'), $this->sut->getVisibility());
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->sut->getName());
    }

    public function testGetParameters()
    {
        self::assertEquals([$this->property], $this->sut->getParameters());
    }

    public function testGetReturnType()
    {
        self::assertEquals('', $this->sut->getReturnType());
    }

    public function testIsNullableReturnType()
    {
        self::assertFalse($this->sut->isNullableReturnType());
    }
}
