<?php
namespace NullDev\Nemesis\Tests\Integration\CodeGenerator\Methods\Autonomous;

use NullDev\Nemesis\CodeGenerator\Methods\Autonomous\MockeryMethod;
use stdClass;

/**
 *
 */
class MockeryMethodTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MockeryMethod
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $class = new stdClass();
        $method = new stdClass();


        $this->object = new MockeryMethod($class, $method);
    }
    /**
     *
     */
    public function testGetTestMethod()
    {
        $this->markTestIncomplete('TODO');
    }
    /**
     *
     */
    public function testGetMethodParamVariableName()
    {
        $this->markTestIncomplete('TODO');
    }
    /**
     *
     */
    public function testGetMethodParamsList()
    {
        $this->markTestIncomplete('TODO');
    }
    /**
     *
     */
    public function testGetParamCalling()
    {
        $this->markTestIncomplete('TODO');
    }
    /**
     *
     */
    public function testGenerate()
    {
        $this->markTestIncomplete('TODO');
    }
    /**
     *
     */
    public function testRender()
    {
        $this->markTestIncomplete('TODO');
    }
}
