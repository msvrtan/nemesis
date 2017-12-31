<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\Skeleton\SourceCode\Definition\SingleValueObject;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SingleValueObjectGenerator;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SingleValueObjectGenerator
 * @group  integration
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SingleValueObjectGeneratorTest extends BaseDefinitionGeneratorTestCase
{
    /** @var SingleValueObjectGenerator */
    protected $sut;

    protected function initializeSubjectUnderTest()
    {
        $this->sut = $this->getService(SingleValueObjectGenerator::class);
    }

    /** @dataProvider provideDefinitions */
    public function testSupports(SingleValueObject $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideDefinitions */
    public function testGenerateAsString(SingleValueObject $definition, string $filePath)
    {
        $result = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideDefinitions */
    public function testGenerate(SingleValueObject $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }
}
