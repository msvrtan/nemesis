<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestGetterMethod;

/**
 * @see TestGetterMethodGeneratorSpec
 * @see TestGetterMethodGeneratorTest
 */
class TestGetterMethodGenerator extends BaseTestMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof TestGetterMethod) {
            return true;
        }

        return false;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        $code->addBody(
            sprintf(
                'self::assertSame($this->%s, $this->sut->%s());',
                $method->getProperty()->getName(),
                $method->getMethodUnderTest()
            )
        );
    }

    public function getMethodGeneratorPriority(): int
    {
        return 50;
    }
}
