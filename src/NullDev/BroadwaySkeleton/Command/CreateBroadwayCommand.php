<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use Webmozart\Assert\Assert;

/**
 * @see CreateBroadwayCommandSpec
 * @see CreateBroadwayCommandTest
 */
class CreateBroadwayCommand
{
    /** @var ClassDefinition */
    private $classType;
    /** @var Parameter[]|array */
    private $parameters;

    public function __construct(ClassDefinition $classType, array $parameters)
    {
        Assert::allIsInstanceOf($parameters, Parameter::class);

        $this->classType  = $classType;
        $this->parameters = $parameters;
    }

    public function getClassDefinition(): ClassDefinition
    {
        return $this->classType;
    }

    /** @return Parameter[]|array */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
