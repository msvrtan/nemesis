<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use Exception;

abstract class SimpleTestMethod
{
    public function getParamsAsClassDefinitions(): array
    {
        return [];
    }

    public function getVisibility(): string
    {
        return 'public';
    }

    public function isStatic(): bool
    {
        return false;
    }

    public function getMethodParameters(): array
    {
        return [];
    }

    public function hasMethodReturnType(): bool
    {
        return false;
    }

    public function getMethodReturnType(): string
    {
        throw new Exception("Err 124125: PHPUnit simple test methods don't use return types.");
    }
}
