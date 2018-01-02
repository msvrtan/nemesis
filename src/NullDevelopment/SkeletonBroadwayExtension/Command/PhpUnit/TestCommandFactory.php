<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\Command\SourceCode\Command;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;
use Webmozart\Assert\Assert;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit\TestCommandFactorySpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit\TestCommandFactoryTest
 */
class TestCommandFactory
{
    /**
     * @var array
     */
    private $factories;

    public function __construct(array $factories)
    {
        Assert::allIsInstanceOf($factories, PhpUnitMethodFactory::class);
        $this->factories = $factories;
    }

    public function createFromCommand(Command $definition): TestCommand
    {
        $methods = [];

        foreach ($this->factories as $factory) {
            $methods = array_merge($methods, $factory->create($definition));
        }

        $testClassName  = ClassName::create('Tests\\'.$definition->getFullClassName().'Test');
        $testParentName = ClassName::create('PHPUnit\\Framework\\TestCase');

        $properties = [];

        foreach ($definition->getProperties() as $property) {
            $properties[] = $property;
        }
        $properties[] = new Property('sut', $definition->getName(), false, false, null, new Visibility('private'));

        return new TestCommand($testClassName, $testParentName, [], [], [], $properties, $methods, $definition->getName());
    }
}
