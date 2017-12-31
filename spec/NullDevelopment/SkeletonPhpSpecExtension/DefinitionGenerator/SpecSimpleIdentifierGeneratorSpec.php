<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleIdentifierGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\GetterSpecMethodGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\InitializableMethodGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\LetMethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecSimpleIdentifierGeneratorSpec extends ObjectBehavior
{
    public function let(
        LetMethodGenerator $letMethodGenerator,
        InitializableMethodGenerator $initializableMethodGenerator,
        GetterSpecMethodGenerator $getterSpecMethodGenerator
    ) {
        $this->beConstructedWith([$letMethodGenerator, $initializableMethodGenerator, $getterSpecMethodGenerator]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSimpleIdentifierGenerator::class);
    }
}