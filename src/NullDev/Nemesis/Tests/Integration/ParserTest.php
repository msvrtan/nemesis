<?php
namespace NullDev\Nemesis\Tests\Integration;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Mockery as m;
use PhpParser;

//class ParserTest extends WebTestCase
class ParserTest extends \PHPUnit_Framework_TestCase
{
    protected $client;
    protected $em;
    protected $logger;

    public function setUp()
    {
    }

    public function testNothing()
    {
        $this->markTestIncomplete();
    }

    public function te2stNothing()
    {
        $code = file_get_contents(NEMESIS_TESTDATA_PATH.'/Calculator/SimpleCalculator.php');

        $parser        = new \PhpParser\Parser(new \PhpParser\Lexer());
        $prettyPrinter = new \PhpParser\PrettyPrinter\Standard();
        //$factory       = new \PhpParser\BuilderFactory();

        try {
            // parse
            $stmts = $parser->parse($code);

            //$stmts[0]->stmts[0]->stmts[] = $factory->property('someProperty')->makeProtected();

            // pretty print
            $code = $prettyPrinter->prettyPrint($stmts);

            //var_dump($stmts);

            //file_put_contents('test.php', $code);
        } catch (PhpParser\Error $e) {
            echo 'Parse Error: ', $e->getMessage();
        }
    }

    public function te3stNothing()
    {
        require NEMESIS_TESTDATA_PATH.'/Calculator/BasicCalculator.php';

        //$reflection = new \ReflectionClass('Calculator\BasicCalculator');

        $factory = new \PhpParser\BuilderFactory();

        $constructor         = new PhpParser\Node\Expr\New_(
            new PhpParser\Node\Name('BasicCalculator'),
            [
                new PhpParser\Node\Arg(
                    new PhpParser\Node\Scalar\String_('a')
                ),
                new PhpParser\Node\Arg(
                    new PhpParser\Node\Scalar\String_('n')
                ),
            ]
        );
        $constructor->args[] = new PhpParser\Node\Arg(
            new PhpParser\Node\Scalar\String_('n')
        );

        $methodSetUp =
            $factory->method('setUp')
                ->makePublic()
                // it is possible to add manually created nodes
                ->addStmt(
                    new PhpParser\Node\Expr\Assign(
                        new PhpParser\Node\Expr\Variable('this->object'),
                        $constructor
                    )
                );

        $class = $factory->class('BasicCalcultorTest')
            ->extend('PHPUnit_Framework_TestCase')
            ->addStmt($methodSetUp)
            ->addStmt($factory->property('object')->makeProtected());

        $node = $factory->namespace('Tests\Unit\Calculator')
            ->addStmt($factory->use('Calculator\BasicCalculator')->as('BasicCalculator'))
            ->addStmt($class)
            ->getNode();

        $stmts         = [$node];
        $prettyPrinter = new PhpParser\PrettyPrinter\Standard();
        $code          = $prettyPrinter->prettyPrintFile($stmts);

        echo $code;
    }

    public function t1estNothing()
    {
        $factory = new \PhpParser\BuilderFactory();

        $method1 =
            $factory->method('someMethod')
                ->makePublic()
                ->makeAbstract()// ->makeFinal()
                ->addParam($factory->param('someParam')->setTypeHint('SomeClass'))
                ->setDocComment(
                    '/**
                              * This method does something.
                              *
                              * @param SomeClass And takes a parameter
                              */'
                );

        $method2 =
            $factory->method('anotherMethod')
                ->makeProtected()// ->makePublic() [default], ->makePrivate()
                ->addParam($factory->param('someParam')->setDefault('test'))
                // it is possible to add manually created nodes
                ->addStmt(new PhpParser\Node\Stmt\Echo_([new PhpParser\Node\Expr\Variable('someParam')]))
                ->addStmt(
                    new PhpParser\Node\Expr\Assign(
                        new PhpParser\Node\Expr\Variable('someParam'),
                        new PhpParser\Node\Scalar\String_('someParam')
                    )
                );

        $class = $factory->class('SomeClass')
            ->extend('SomeOtherClass')
            ->implement('A\Few')
            ->implement('\Interfaces')
            ->addStmt($method1)
            ->addStmt($method2)
            // properties will be correctly reordered above the methods
            ->addStmt($factory->property('someProperty')->makeProtected())
            ->addStmt($factory->property('anotherProperty')->makePrivate()->setDefault([1, 2, 3]));

        $node = $factory->namespace('Name\Space')
            ->addStmt($factory->use('Some\Other\Thingy')->as('SomeOtherClass'))
            ->addStmt($class)
            ->getNode();

        $stmts         = [$node];
        $prettyPrinter = new PhpParser\PrettyPrinter\Standard();
        $code          = $prettyPrinter->prettyPrintFile($stmts);

        echo $code;
        file_put_contents('test.php', $code);
    }
}
