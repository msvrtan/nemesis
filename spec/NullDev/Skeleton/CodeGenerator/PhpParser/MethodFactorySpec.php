<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\CodeGenerator\PhpParser;

use NullDev\Skeleton\CodeGenerator\PhpParser\MethodFactory;
use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\ConstructorGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\GetterGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\ToStringGenerator;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Methods\ToStringMethod;
use PhpParser\Builder\Method as PhpBuilderMethod;
use PhpSpec\ObjectBehavior;

class MethodFactorySpec extends ObjectBehavior
{
    public function let(
        ConstructorGenerator $constructorGenerator,
        GetterGenerator $getterGenerator,
        ToStringGenerator $toStringGenerator
    ) {
        $this->beConstructedWith(
            [
                $constructorGenerator,
                $getterGenerator,
                $toStringGenerator,
            ]
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(MethodFactory::class);
    }

    public function it_will_run_supported_generator(
        ConstructorGenerator $constructorGenerator,
        ConstructorMethod $constructorMethod,
        PhpBuilderMethod $phpBuilderMethod
    ) {
        $constructorGenerator->supports($constructorMethod)->shouldBeCalled()->willReturn(true);
        $constructorGenerator->generate($constructorMethod)->shouldBeCalled()->willReturn($phpBuilderMethod);

        $this->generate($constructorMethod)->shouldReturn($phpBuilderMethod);
    }

    public function it_will_find_supported_generator(
        ConstructorGenerator $constructorGenerator,
        GetterGenerator $getterGenerator,
        ToStringGenerator $toStringGenerator,
        ToStringMethod $toStringMethod,
        PhpBuilderMethod $phpBuilderMethod
    ) {
        $constructorGenerator->supports($toStringMethod)->shouldBeCalled()->willReturn(false);
        $getterGenerator->supports($toStringMethod)->shouldBeCalled()->willReturn(false);
        $toStringGenerator->supports($toStringMethod)->shouldBeCalled()->willReturn(true);

        $toStringGenerator->generate($toStringMethod)->shouldBeCalled()->willReturn($phpBuilderMethod);

        $this->generate($toStringMethod)->shouldReturn($phpBuilderMethod);
    }

    public function it_will_throw_exception_if_method_not_supported_by_generator(
        ConstructorGenerator $constructorGenerator,
        GetterGenerator $getterGenerator,
        ToStringGenerator $toStringGenerator,
        Method $randomMethod
    ) {
        $constructorGenerator->supports($randomMethod)->shouldBeCalled()->willReturn(false);
        $getterGenerator->supports($randomMethod)->shouldBeCalled()->willReturn(false);
        $toStringGenerator->supports($randomMethod)->shouldBeCalled()->willReturn(false);

        $this->shouldThrow(\Exception::class)->duringGenerate($randomMethod);
    }
}
