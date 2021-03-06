<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSimpleCollectionGenerator;
use PhpSpec\ObjectBehavior;

class TestSimpleCollectionGeneratorSpec extends ObjectBehavior
{
    public function let(ExampleMaker $exampleMaker)
    {
        $this->beConstructedWith([], $exampleMaker);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSimpleCollectionGenerator::class);
    }
}
