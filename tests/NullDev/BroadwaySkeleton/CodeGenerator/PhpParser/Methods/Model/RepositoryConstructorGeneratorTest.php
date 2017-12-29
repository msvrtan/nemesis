<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\RepositoryConstructorGenerator;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\RepositoryConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use PhpParser\BuilderFactory;
use Tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods\BaseOutputGeneratorTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\RepositoryConstructorGenerator
 * @group  nemesis
 */
class RepositoryConstructorGeneratorTest extends BaseOutputGeneratorTestCase
{
    public function getGenerator(): RepositoryConstructorGenerator
    {
        return new RepositoryConstructorGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     */
    public function testOutput(ClassDefinition $classType, string $fileName): void
    {
        $method = new RepositoryConstructorMethod($classType);

        $this->assertMethodOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        $classType = ClassDefinition::createFromFullyQualified('Something\\Xxx');

        return [
            [$classType, '0-no-param'],
        ];
    }

    public function getBasePath(): string
    {
        $fullName = explode('\\', get_class($this));

        $currentTestClassName = array_pop($fullName);

        return __DIR__.'/sample-output/'.$currentTestClassName;
    }
}
