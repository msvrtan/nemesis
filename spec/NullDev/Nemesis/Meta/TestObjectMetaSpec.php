<?php

namespace spec\NullDev\Nemesis\Meta;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestObjectMetaSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Meta\TestObjectMeta');
    }

    public function let()
    {
        // $this->beConstructedWith('/path/to/class.php', 'Vendor\Namespace\ClassName');
    }

    public function it_has_target_file_path()
    {
        $this->setTargetFilePath('/Path/To/OtherClass.php');
        $this->getTargetFilePath()->shouldReturn('/Path/To/OtherClass.php');
    }

    public function it_has_default_target_file_path()
    {
        $this->getTargetFilePath()->shouldReturn(null);
    }

    public function it_has_target_fully_qualified_class_name()
    {
        $this->setTargetFqcn('Vendor\Namespace\OtherClassName');
        $this->getTargetFqcn()->shouldReturn('Vendor\Namespace\OtherClassName');
    }

    public function it_has_default_fully_qualified_class_name()
    {
        $this->getTargetFqcn()->shouldReturn(null);
    }

    public function it_has_target_class_name()
    {
        $this->setTargetClassName('OtherClassName');
        $this->getTargetClassName()->shouldReturn('OtherClassName');
    }

    public function it_has_default_target_class_name()
    {
        $this->getTargetClassName()->shouldReturn(null);
    }

    public function it_has_result_class_name()
    {
        $this->setResultClassName('OtherClassNameTest');
        $this->getResultClassName()->shouldReturn('OtherClassNameTest');
    }

    public function it_has_default_result_class_name()
    {
        $this->getResultClassName()->shouldReturn(null);
    }

    public function it_has_result_namespace()
    {
        $this->setResultNamespace('Vendor\Tests\Unit\Namespace');
        $this->getResultNamespace()->shouldReturn('Vendor\Tests\Unit\Namespace');
    }

    public function it_has_default_result_namespace()
    {
        $this->getResultNamespace()->shouldReturn(null);
    }
}
