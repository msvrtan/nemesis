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
    protected $object;

    /**
     */
    protected function setUp()
    {
        
        $this->object = new Builder();
    }
    /**
     *
     */
    public function testNothing()
    {
        $this->markTestIncomplete('TODO');
    }
}
