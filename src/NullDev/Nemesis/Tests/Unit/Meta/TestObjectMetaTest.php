<?php
namespace NullDev\Nemesis\Tests\Unit\Meta;

use NullDev\Nemesis\Meta\TestObjectMeta;
use Mockery as m;

/**
 *
 */
class TestObjectMetaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TestObjectMeta
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new TestObjectMeta();
    }
    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetTargetFilePath()
    {
        $this->assertEquals(null, $this->object->getTargetFilePath());
    }
    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetTargetFilePath()
    {
        $targetFilePath = 'targetFilePath';
        $this->object->setTargetFilePath($targetFilePath);
        $this->assertEquals($targetFilePath, $this->object->getTargetFilePath());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetTargetFqcn()
    {
        $this->assertEquals(null, $this->object->getTargetFqcn());
    }
    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetTargetFqcn()
    {
        $targetFqcn = 'targetFqcn';
        $this->object->setTargetFqcn($targetFqcn);
        $this->assertEquals($targetFqcn, $this->object->getTargetFqcn());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetTargetClassName()
    {
        $this->assertEquals(null, $this->object->getTargetClassName());
    }
    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetTargetClassName()
    {
        $targetClassName = 'targetClassName';
        $this->object->setTargetClassName($targetClassName);
        $this->assertEquals($targetClassName, $this->object->getTargetClassName());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetResultNameSpace()
    {
        $this->assertEquals(null, $this->object->getResultNameSpace());
    }
    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetResultNameSpace()
    {
        $resultNameSpace = 'resultNameSpace';
        $this->object->setResultNameSpace($resultNameSpace);
        $this->assertEquals($resultNameSpace, $this->object->getResultNameSpace());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetResultClassName()
    {
        $this->assertEquals(null, $this->object->getResultClassName());
    }
    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetResultClassName()
    {
        $resultClassName = 'resultClassName';
        $this->object->setResultClassName($resultClassName);
        $this->assertEquals($resultClassName, $this->object->getResultClassName());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetResultFilePath()
    {
        $this->assertEquals(null, $this->object->getResultFilePath());
    }
    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetResultFilePath()
    {
        $resultFilePath = 'resultFilePath';
        $this->object->setResultFilePath($resultFilePath);
        $this->assertEquals($resultFilePath, $this->object->getResultFilePath());
    }

    /**
     *
     */
    public function testGetReflectionClass()
    {
        $this->markTestIncomplete('TODO');
    }
}
