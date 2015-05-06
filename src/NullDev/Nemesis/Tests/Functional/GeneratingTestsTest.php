<?php
namespace NullDev\Nemesis\Tests\Functional;

use NullDev\Nemesis\Meta\TestObjectMeta;
use NullDev\Nemesis\Target\Generator\TestClassGenerator;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Mockery as m;
use PhpParser;
use SplFileInfo;

class GeneratingTestsTest extends \PHPUnit_Framework_TestCase
{
    protected $target;

    public function setUp()
    {
        $this->target = new TestClassGenerator();
    }

    /**
     * @param TestObjectMeta $meta
     * @param                $expectedResultFileName
     *
     * @dataProvider getNothing2
     */
    public function testNothing(TestObjectMeta $meta, $expectedResultFileName)
    {
        require_once $meta->getTargetFilePath();

        $result = $this->target->generate($meta);

        $expected = file_get_contents(__DIR__.'/'.$expectedResultFileName);

        $this->assertEquals($expected, $result);

        /*
        $file = new SplFileInfo($meta->getResultFilePath());

        mkdir($file->getPath(), 777, true);
        */

        file_put_contents($meta->getResultFilePath(), $expected);
    }

    public function getNothing()
    {
        return [
            [
                (new TestObjectMeta())
                    ->setTargetFilePath(NEMESIS_TESTDATA_PATH.'/Calculator/BasicCalculator.php')
                    ->setTargetFqcn('Calculator\BasicCalculator')
                    ->setTargetClassName('BasicCalculator')
                    ->setResultNameSpace('Tests\Unit\Calculator')
                    ->setResultClassName('BasicCalculatorTest')
                    ->setResultFilePath(NEMESIS_TESTDATA_PATH.'/Tests/Unit/Calculator/BasicCalculatorTest.php')
                ,
                'Calculator_BasicCalculator.resultRender',
            ],
        ];
    }

    public function getNothing2()
    {
        return [
            [
                (new TestObjectMeta())
                    ->setTargetFilePath(NEMESIS_TESTDATA_PATH.'/Calculator/AdvancedCalculator.php')
                    ->setTargetFqcn('Calculator\AdvancedCalculator')
                    ->setTargetClassName('AdvancedCalculator')
                    ->setResultNameSpace('Tests\Unit\Calculator')
                    ->setResultClassName('AdvancedCalculatorTest')
                    ->setResultFilePath(NEMESIS_TESTDATA_PATH.'/Tests/Unit/Calculator/AdvancedCalculatorTest.php')
                ,
                'Calculator_AdvancedCalculator.resultRender',
            ],
            [
                (new TestObjectMeta())
                    ->setTargetFilePath(NEMESIS_TESTDATA_PATH.'/Calculator/BasicCalculator.php')
                    ->setTargetFqcn('Calculator\BasicCalculator')
                    ->setTargetClassName('BasicCalculator')
                    ->setResultNameSpace('Tests\Unit\Calculator')
                    ->setResultClassName('BasicCalculatorTest')
                    ->setResultFilePath(NEMESIS_TESTDATA_PATH.'/Tests/Unit/Calculator/BasicCalculatorTest.php')
                ,
                'Calculator_BasicCalculator.resultRender',
            ],
            [
                (new TestObjectMeta())
                    ->setTargetFilePath(NEMESIS_TESTDATA_PATH.'/Calculator/FinalCalculator.php')
                    ->setTargetFqcn('Calculator\FinalCalculator')
                    ->setTargetClassName('FinalCalculator')
                    ->setResultNameSpace('Tests\Unit\Calculator')
                    ->setResultClassName('FinalCalculatorTest')
                    ->setResultFilePath(NEMESIS_TESTDATA_PATH.'/Tests/Unit/Calculator/FinalCalculatorTest.php')
                ,
                'Calculator_FinalCalculator.resultRender',
            ],
            [
                (new TestObjectMeta())
                    ->setTargetFilePath(NEMESIS_TESTDATA_PATH.'/Calculator/SimpleCalculator.php')
                    ->setTargetFqcn('Calculator\SimpleCalculator')
                    ->setTargetClassName('SimpleCalculator')
                    ->setResultNameSpace('Tests\Unit\Calculator')
                    ->setResultClassName('SimpleCalculatorTest')
                    ->setResultFilePath(NEMESIS_TESTDATA_PATH.'/Tests/Unit/Calculator/SimpleCalculatorTest.php')
                ,
                'Calculator_SimpleCalculator.resultRender',
            ],
        ];
    }
}
