<?php
namespace NullDev\Nemesis\Tests\Unit\CodeGenerator\Methods\Autonomous;

use NullDev\Nemesis\CodeGenerator\Methods\Autonomous\MockeryMethod;
use Mockery as m;

/**
 *
 */
class MockeryMethodTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testNoParams()
    {
        $expected = file_get_contents(__DIR__.'/MockeryMethod/NoParams.resultRender');

        $mockClass  = m::mock('ReflectionClass');
        $mockMethod = m::mock('ReflectionMethod');

        $mockMethod->shouldReceive('getName')->twice()->andReturn('getVarA');
        $mockMethod->shouldReceive('getParameters')->twice()->andReturn([]);
        $mockClass->shouldReceive('getName')->once()->andReturn('Class');

        $target = new MockeryMethod($mockClass, $mockMethod);

        $result = $target->render();

        $this->assertEquals($expected, $result);
    }

    /**
     *
     */
    public function te1stSimpleParam()
    {
        $expected = file_get_contents(__DIR__.'/MockeryMethod/SimpleParam.resultRender');

        $mockClass  = m::mock('ReflectionClass');
        $mockMethod = m::mock('ReflectionMethod');
        $mockParam1 = m::mock();

        $mockMethod->shouldReceive('getName')->twice()->andReturn('getVarA');
        $mockMethod->shouldReceive('getParameters')->twice()->andReturn([$mockParam1]);

        $mockParam1->shouldReceive('getName')->twice()->andReturn('param1');
        $mockParam1->shouldReceive('getClass')->once()->andReturn(false);
        $mockParam1->shouldReceive('isArray')->once()->andReturn(false);

        $target = new MockeryMethod($mockClass, $mockMethod);

        $result = $target->render();

        $this->assertEquals($expected, $result);
    }

    /**
     *
     */
    public function te1stObjectParam()
    {
        $expected = file_get_contents(__DIR__.'/MockeryMethod/ObjectParam.resultRender');

        $mockClass       = m::mock('ReflectionClass');
        $mockMethod      = m::mock('ReflectionMethod');
        $mockParam1      = m::mock();
        $mockParam1Class = m::mock();

        $mockMethod->shouldReceive('getName')->twice()->andReturn('getVarA');
        $mockMethod->shouldReceive('getParameters')->twice()->andReturn([$mockParam1]);

        $mockParam1->shouldReceive('getName')->twice()->andReturn('param1');
        $mockParam1->shouldReceive('getClass')->twice()->andReturn($mockParam1Class);
        $mockParam1->shouldReceive('isArray')->once()->andReturn(false);

        $mockParam1Class->shouldReceive('getName')->once()->andReturn('Vendor\Namespace\Class');

        $target = new MockeryMethod($mockClass, $mockMethod);

        $result = $target->render();

        $this->assertEquals($expected, $result);
    }

    /**
     *
     */
    public function te1stMultiParam()
    {
        $expected = file_get_contents(__DIR__.'/MockeryMethod/MultiParam.resultRender');

        $mockClass       = m::mock('ReflectionClass');
        $mockMethod      = m::mock('ReflectionMethod');
        $mockParam1      = m::mock();
        $mockParam1Class = m::mock();
        $mockParam2      = m::mock();
        $mockParam2Class = m::mock();

        $mockMethod->shouldReceive('getName')->twice()->andReturn('getVarA');
        $mockMethod->shouldReceive('getParameters')->twice()->andReturn([$mockParam1, $mockParam2]);

        $mockParam1->shouldReceive('getName')->twice()->andReturn('param1');
        $mockParam1->shouldReceive('getClass')->twice()->andReturn($mockParam1Class);
        $mockParam1->shouldReceive('isArray')->once()->andReturn(false);

        $mockParam1Class->shouldReceive('getName')->once()->andReturn('Vendor\Namespace\Class');

        $mockParam2->shouldReceive('getName')->twice()->andReturn('param2');
        $mockParam2->shouldReceive('getClass')->twice()->andReturn($mockParam2Class);
        $mockParam2->shouldReceive('isArray')->once()->andReturn(false);

        $mockParam2Class->shouldReceive('getName')->once()->andReturn('Vendor\Namespace\Class2');

        $target = new MockeryMethod($mockClass, $mockMethod);

        $result = $target->render();

        $this->assertEquals($expected, $result);
    }

    /**
     *
     */
    public function te1stMixedParam()
    {
        $expected = file_get_contents(__DIR__.'/MockeryMethod/MixedParam.resultRender');

        $mockClass       = m::mock('ReflectionClass');
        $mockMethod      = m::mock('ReflectionMethod');
        $mockParam1      = m::mock();
        $mockParam1Class = m::mock();
        $mockParam2      = m::mock();

        $mockMethod->shouldReceive('getName')->twice()->andReturn('getVarA');
        $mockMethod->shouldReceive('getParameters')->twice()->andReturn([$mockParam1, $mockParam2]);

        $mockParam1->shouldReceive('getName')->twice()->andReturn('param1');
        $mockParam1->shouldReceive('getClass')->twice()->andReturn($mockParam1Class);
        $mockParam1->shouldReceive('isArray')->once()->andReturn(false);

        $mockParam1Class->shouldReceive('getName')->once()->andReturn('Vendor\Namespace\Class');

        $mockParam2->shouldReceive('getName')->twice()->andReturn('param2');
        $mockParam2->shouldReceive('getClass')->once()->andReturn(false);
        $mockParam2->shouldReceive('isArray')->once()->andReturn(false);

        $target = new MockeryMethod($mockClass, $mockMethod);

        $result = $target->render();

        $this->assertEquals($expected, $result);
    }

    /**
     *
     */
    public function te1stArrayParam()
    {
        $expected = file_get_contents(__DIR__.'/MockeryMethod/ArrayParam.resultRender');

        $mockClass  = m::mock('ReflectionClass');
        $mockMethod = m::mock('ReflectionMethod');
        $mockParam1 = m::mock();

        $mockMethod->shouldReceive('getName')->twice()->andReturn('getVarA');
        $mockMethod->shouldReceive('getParameters')->twice()->andReturn([$mockParam1]);

        $mockParam1->shouldReceive('getName')->twice()->andReturn('param1');
        $mockParam1->shouldReceive('isArray')->once()->andReturn(true);
        $mockParam1->shouldReceive('getClass')->never()->andReturn(false);

        $target = new MockeryMethod($mockClass, $mockMethod);

        $result = $target->render();

        $this->assertEquals($expected, $result);
    }
}
