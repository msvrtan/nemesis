<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model;

use Exception;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;

class RepositoryConstructorMethod implements Method
{
    private $params = [];
    private $modelClassDefinition;

    public function __construct(ClassDefinition $modelClassDefinition)
    {
        $this->modelClassDefinition = $modelClassDefinition;
    }

    public function getModelClassDefinition(): ClassDefinition
    {
        return $this->modelClassDefinition;
    }

    public function getParamsAsClassDefinitions(): array
    {
        $result = [];
        foreach ($this->params as $param) {
            if (true === $param->hasType()) {
                $result[] = $param->getClassDefinition();
            }
        }

        return $result;
    }

    public function getVisibility(): string
    {
        return 'public';
    }

    public function isStatic(): bool
    {
        return false;
    }

    public function getMethodName(): string
    {
        return '__constructor';
    }

    public function getMethodParameters(): array
    {
        return $this->params;
    }

    public function hasMethodReturnType(): bool
    {
        return false;
    }

    public function getMethodReturnType(): string
    {
        throw new Exception('Err 43212311: Method return type not supported on constructor.');
    }
}
