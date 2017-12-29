<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Uuid\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;

/**
 * @see UuidCreateMethodSpec
 * @see UuidCreateMethodTest
 */
class UuidCreateMethod implements Method
{
    /** @var ClassDefinition */
    private $classToBuild;

    public function __construct(ClassDefinition $classToBuild)
    {
        $this->classToBuild = $classToBuild;
    }

    public function getVisibility(): string
    {
        return 'public';
    }

    public function isStatic(): bool
    {
        return true;
    }

    public function getMethodName(): string
    {
        return 'create';
    }

    public function getMethodParameters(): array
    {
        return [];
    }

    public function hasMethodReturnType(): bool
    {
        return true;
    }

    public function getMethodReturnType(): string
    {
        return $this->classToBuild->getName();
    }
}
