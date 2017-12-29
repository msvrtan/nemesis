<?php

declare(strict_types=1);

namespace spec\NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use Exception;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestNothingMethod;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class TestNothingMethodSpec extends ObjectBehavior
{
    public function let(ImprovedClassSource $subjectUnderTest)
    {
        $this->beConstructedWith($subjectUnderTest);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestNothingMethod::class);
    }

    public function it_has_no_method_parameters()
    {
        $this->getParamsAsClassDefinitions()->shouldReturn([]);
        $this->getMethodParameters()->shouldReturn([]);
    }

    public function it_is_a_public_method()
    {
        $this->getVisibility()->shouldReturn('public');
    }

    public function it_is_not_a_static_method()
    {
        $this->isStatic()->shouldReturn(false);
    }

    public function it_has_no_return_type()
    {
        $this->hasMethodReturnType()->shouldReturn(false);
    }

    public function it_throws_exception_if_asked_for_method_return_type()
    {
        $this->shouldThrow(Exception::class)->duringGetMethodReturnType();
    }

    public function it_exposes_method_name()
    {
        $this->getMethodName()->shouldReturn('testNothing');
    }

    public function it_exposes_subject_under_test(ImprovedClassSource $subjectUnderTest)
    {
        $this->getSubjectUnderTest()->shouldReturn($subjectUnderTest);
    }

    public function it_exposes_subject_under_test_name(ImprovedClassSource $subjectUnderTest)
    {
        $subjectUnderTest->getName()->shouldBeCalled()->willReturn('Money');

        $this->getSubjectUnderTestName()->shouldReturn('Money');
    }
}
