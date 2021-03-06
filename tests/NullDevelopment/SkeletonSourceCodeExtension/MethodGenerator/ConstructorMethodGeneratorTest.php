<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\ClassType;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\ConstructorMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\ConstructorMethodGenerator
 * @group  unit
 */
class ConstructorMethodGeneratorTest extends TestCase
{
    use AssertOutputTrait;

    /** @var ConstructorMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new ConstructorMethodGenerator();
    }

    /** @dataProvider provideMethods */
    public function testSupports(ConstructorMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(ConstructorMethod $method, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString(new ClassType('zzzz'), $method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        $firstName = Fixtures::firstNameProperty();

        return [
            [new ConstructorMethod([]), '__construct.empty.output'],
            [new ConstructorMethod([$firstName]), '__construct.firstName.output'],
        ];
    }
}
