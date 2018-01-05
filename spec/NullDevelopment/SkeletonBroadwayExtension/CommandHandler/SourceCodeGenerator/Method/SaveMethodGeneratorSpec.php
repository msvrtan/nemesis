<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCodeGenerator\Method;

use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCodeGenerator\Method\SaveMethodGenerator;
use PhpSpec\ObjectBehavior;

class SaveMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SaveMethodGenerator::class);
    }
}