<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestSingleValueObject;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSingleValueObjectGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\Method\SetUpMethod;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestGetterMethod;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSingleValueObjectGenerator
 * @group  integration
 */
class TestSingleValueObjectGeneratorTest extends SfTestCase
{
    use AssertOutputTrait;

    /** @var TestSingleValueObjectGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(TestSingleValueObjectGenerator::class);
    }

    /** @dataProvider provideTestSingleValueObject */
    public function testSupports(TestSingleValueObject $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideTestSingleValueObject */
    public function testGenerateAsString(TestSingleValueObject $definition, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideTestSingleValueObject */
    public function testGenerate(TestSingleValueObject $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideTestSingleValueObject(): array
    {
        $sutClass = Fixtures::userEntity();

        $firstName = Fixtures::firstNameProperty();

        $class  = ClassName::create('spec\\MyVendor\\UserEntityTest');
        $parent = ClassName::create('PhpUnit\\ObjectBehavior');

        $letMethod        = new SetUpMethod($sutClass, [$firstName]);
        $exposesFirstName = new TestGetterMethod('testGetFirstName', 'getFirstName', $firstName);
        $exposesValue     = new TestGetterMethod('testGetValue', 'getValue', $firstName);

        return [
            [
                new TestSingleValueObject($class, $parent, [], [], [], [$letMethod, $exposesFirstName, $exposesValue], $sutClass),
                'single_value_object.empty.output',
            ],
        ];
    }
}