<?php

namespace NullDev\Nemesis\CodeGenerator\Methods\Simple;

use NullDev\Nemesis\CodeBuilder\NikicPhpParser\Factory;
use PhpParser;
use ReflectionMethod;

class MockeryMethod
{
    protected $method;
    protected $builder;
    protected $printer;

    /**
     * @var generated code.
     */
    protected $generated;

    public function __construct(ReflectionMethod $method)
    {
        $this->method  = $method;
        $this->builder = new Factory();
        $this->printer = new PhpParser\PrettyPrinter\Standard();
    }

    public function getTestMethod()
    {
        return 'test'.ucfirst($this->method->getName());
    }

    public function getMethodParamVariableName($param)
    {
        return 'mock'.ucfirst($param->getName());
    }

    public function getMethodParamsList()
    {
        $methodParamsList = [];

        foreach ($this->method->getParameters() as $param) {
            $methodParamsList[] = $this->builder->variable($this->getMethodParamVariableName($param));
        }

        return $methodParamsList;
    }

    public function getParamCalling($param)
    {
        if ($param->isArray()) {
            return $this->builder->arr();
        }

        if ($param->getClass()) {
            return $this->builder->mockeryMock($param->getClass()->getName());
        }

        return $this->builder->mockeryMock();
    }

    public function generate()
    {
        if (null === $this->generated) {
            $this->generated = $this->builder->method($this->getTestMethod())->makePublic();

            foreach ($this->method->getParameters() as $param) {
                $this->generated->addStmt(
                    $this->builder->assign($this->getMethodParamVariableName($param), $this->getParamCalling($param))
                );
            }

            $this->generated->addStmt(
                $this->builder->assign(
                    'result',
                    $this->builder->methodCall('this->target', $this->method->getName(), $this->getMethodParamsList())
                )
            );
            $this->generated->addStmt(
                $this->builder->mockeryAssertNotNull('result')
            );
        }

        return $this->generated;
    }

    public function render()
    {
        return $this->printer->prettyPrint([$this->generate()->getNode()]);
    }
}
