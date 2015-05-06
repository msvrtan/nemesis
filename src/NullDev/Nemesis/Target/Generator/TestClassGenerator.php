<?php

namespace NullDev\Nemesis\Target\Generator;

use PhpParser;
use NullDev\Nemesis\Meta\TestObjectMeta;

class TestClassGenerator
{
    protected $factory;
    protected $parser;
    protected $printer;

    public function __construct()
    {
        $this->factory = new \PhpParser\BuilderFactory();
        $this->parser  = new \PhpParser\Parser(new \PhpParser\Lexer());
        $this->printer = new \PhpParser\PrettyPrinter\Standard();
    }

    public function generate(TestObjectMeta $meta)
    {
        $methodSetUp = $this->generateMethodSetUp($meta);

        $class = $this->factory->class($meta->getResultClassName())
            ->extend('\PHPUnit_Framework_TestCase')
            ->addStmt($methodSetUp)
            ->addStmt($this->factory->property('target')->makeProtected());

        foreach ($meta->getReflectionClass()->getMethods() as $targetMethodReflection) {
            if ($targetMethodReflection->isConstructor()) {
                continue;
            }

            if (!$targetMethodReflection->isPublic()) {
                continue;
            }
            $methodX = $this->generateMethod($targetMethodReflection);

            $class->addStmt($methodX);
        }

        $node = $this->factory->namespace($meta->getResultNameSpace())
            ->addStmt($this->factory->use($meta->getTargetFqcn()))
            ->addStmt($this->factory->use('Mockery')->as('m'))
            ->addStmt($class);

        $code = $this->printer->prettyPrintFile([$node->getNode()]);

        /*
        echo PHP_EOL.PHP_EOL.PHP_EOL.PHP_EOL;
        var_dump($code);
        echo PHP_EOL.PHP_EOL.PHP_EOL.PHP_EOL;
        */

        return $code;
    }

    public function generateMethod($targetMethodReflection)
    {
        $methodNameX = 'test'.ucfirst($targetMethodReflection->getName());

        $methodParamsList = [];
        $methodX          = $this->factory->method($methodNameX)->makePublic();

        foreach ($targetMethodReflection->getParameters() as $param) {
            $methodParamsList[] = new PhpParser\Node\Expr\Variable('mock'.ucfirst($param->getName()));

            if ($param->getClass()) {
                $paramClass = [
                    new PhpParser\Node\Name(var_export($param->getClass()->getName(), true)),
                ];
            } else {
                $paramClass = [];
            }

            $methodX->addStmt(
                new PhpParser\Node\Expr\Assign(
                    new PhpParser\Node\Expr\Variable('mock'.ucfirst($param->getName())),
                    new PhpParser\Node\Expr\StaticCall(
                        new PhpParser\Node\Name('m'),
                        new PhpParser\Node\Name('mock'),
                        $paramClass
                    )
                )
            );
        }

        $methodX->addStmt(
            new PhpParser\Node\Expr\Assign(
                new PhpParser\Node\Expr\Variable('result'),
                new PhpParser\Node\Expr\MethodCall(
                    new PhpParser\Node\Expr\Variable('this->target'),
                    new PhpParser\Node\Name($targetMethodReflection->getName()),
                    $methodParamsList
                )
            )
        );
        $methodX->addStmt(
            new PhpParser\Node\Expr\MethodCall(
                new PhpParser\Node\Expr\Variable('this'),
                new PhpParser\Node\Name('assertNotNull'),
                [new PhpParser\Node\Expr\Variable('result')]
            )
        );

        return $methodX;
    }

    public function generateMethodSetUp(TestObjectMeta $meta)
    {
        $constructorParamList = [];

        $methodX = $this->factory->method('setUp')->makePublic();

        foreach ($meta->getReflectionClass()->getMethods() as $targetMethodReflection) {
            if ($targetMethodReflection->isConstructor()) {
                foreach ($targetMethodReflection->getParameters() as $param) {
                    $constructorParamList[] = new PhpParser\Node\Expr\Variable('mock'.ucfirst($param->getName()));

                    if ($param->getClass()) {
                        $paramClass = [
                            new PhpParser\Node\Name(var_export($param->getClass()->getName(), true)),
                        ];
                    } else {
                        $paramClass = [];
                    }

                    $methodX->addStmt(
                        new PhpParser\Node\Expr\Assign(
                            new PhpParser\Node\Expr\Variable('mock'.ucfirst($param->getName())),
                            new PhpParser\Node\Expr\StaticCall(
                                new PhpParser\Node\Name('m'),
                                new PhpParser\Node\Name('mock'),
                                $paramClass
                            )
                        )
                    );
                }
            }
        }

        $constructor = new PhpParser\Node\Expr\New_(
            new PhpParser\Node\Name($meta->getTargetClassName()),
            $constructorParamList
        );
        $methodX->addStmt(
            new PhpParser\Node\Expr\Assign(
                new PhpParser\Node\Expr\Variable('this->target'),
                $constructor
            )
        );

        return $methodX;
    }
}
