<?php
namespace NullDev\Nemesis\Tests\Unit\CodeBuilder\NikicPhpParser;

use NullDev\Nemesis\CodeBuilder\NikicPhpParser\Builder;
use Mockery as m;

/**
 *
 */
class BuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Builder
     */
    protected $target;

    /**
     */
    protected function setUp()
    {
        $this->target = new Builder();
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
