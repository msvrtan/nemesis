<?php
namespace NullDev\Nemesis\Tests\Unit\CodeBuilder\NikicPhpParser;

use NullDev\Nemesis\CodeBuilder\NikicPhpParser\Builder;
use Mockery as m;
use PhpParser;

/**
 *
 */
class BuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Builder
     */
    protected $target;
    protected $printer;

    /**
     */
    protected function setUp()
    {
        $this->target  = new Builder();
        $this->printer = new PhpParser\PrettyPrinter\Standard();
    }

    /**
     *
     */
    public function testEmptyMethod()
    {
        $result = $this->target->createMethod('emptyMethod');

        $expected = file_get_contents(__DIR__.'/BuilderTest/EmptyMethod.resultRender');

        $this->assertEquals(
            $expected,
            $this->printer->prettyPrint([$result->getNode()])
        );
    }

    /**
     *
     */
    public function testSetUp()
    {
        $mockClass = m::mock();
        $mockClass->shouldReceive('getTargetClassName')->once()->andReturn('stdClass');
        $mockClass->shouldReceive('getParameters')->twice()->andReturn([]);

        $result = $this->target->createMethod('setUp')->addConstruct($mockClass);

        $expected = file_get_contents(__DIR__.'/BuilderTest/SetUp.resultRender');

        $this->assertEquals(
            $expected,
            $this->printer->prettyPrint([$result->getNode()])
        );
    }

    /**
     *
     */
    public function testSetUpWithConstructorParams()
    {
        $mockClass  = m::mock();
        $mockParam1 = m::mock();
        $mockParam2 = m::mock();

        $mockClass->shouldReceive('getTargetClassName')->once()->andReturn('stdClass');
        $mockClass->shouldReceive('getParameters')->twice()->andReturn([$mockParam1, $mockParam2]);

        $mockParam1->shouldReceive('getName')->twice()->andReturn('param1');
        $mockParam1->shouldReceive('isArray')->once()->andReturn(false);
        $mockParam1->shouldReceive('getClass')->once()->andReturn(false);
        $mockParam2->shouldReceive('getName')->twice()->andReturn('param2');
        $mockParam2->shouldReceive('isArray')->once()->andReturn(false);
        $mockParam2->shouldReceive('getClass')->once()->andReturn(false);

        $result = $this->target->createMethod('setUp')->addConstruct($mockClass);

        $expected = file_get_contents(__DIR__.'/BuilderTest/SetUpWithConstructorParams.resultRender');

        $this->assertEquals(
            $expected,
            $this->printer->prettyPrint([$result->getNode()])
        );
    }

    /**
     *
     */
    public function testNothing()
    {
        $this->markTestIncomplete('TODO');

        $mockConstructor = m::mock();
        $mockMethod      = m::mock();

        $this->target->method('setUp')->construct($mockConstructor);

        $this->target->method('testSomething')->construct($mockConstructor)->test($mockMethod)->assertNotNull();
    }
}
