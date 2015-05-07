<?php

namespace NullDev\Nemesis\CodeBuilder\NikicPhpParser;

use PhpParser;
use PhpParser\Node\Expr\Variable;

class Builder
{
    protected $factory;

    protected $data;

    public function __construct()
    {
        $this->factory = new PhpParser\BuilderFactory();
    }

    public function getNode()
    {
        return $this->data->getNode();
    }

    public function createMethod($methodName)
    {
        $this->data = $this->factory->method($methodName)->makePublic();

        return $this;
    }

    public function getMethodParamVariableName($param)
    {
        return 'mock'.ucfirst($param->getName());
    }

    public function mockeryMock($class = false)
    {
        if ($class === false) {
            $classInstanceName = [];
        } else {
            $classInstanceName = [
                new PhpParser\Node\Name(var_export($class, true)),
            ];
        }

        return new PhpParser\Node\Expr\StaticCall(
            new PhpParser\Node\Name('m'),
            new PhpParser\Node\Name('mock'),
            $classInstanceName
        );
    }

    public function variable($name)
    {
        return new PhpParser\Node\Expr\Variable($name);
    }

    public function mockeryAssertNotNull($variableName)
    {
        return new PhpParser\Node\Expr\MethodCall(
            $this->variable('this'),
            $this->name('assertNotNull'),
            [
                $this->variable($variableName),
            ]
        );
    }

    public function getParamCalling($param)
    {
        if ($param->isArray()) {
            return new PhpParser\Node\Expr\Array_();
        }

        if ($param->getClass()) {
            return $this->mockeryMock($param->getClass()->getName());
        }

        return $this->mockeryMock();
    }

    public function getMethodParamsList($objClass)
    {
        $methodParamsList = [];

        foreach ($objClass->getParameters() as $param) {
            $methodParamsList[] = $this->variable($this->getMethodParamVariableName($param));
        }

        return $methodParamsList;
    }

    public function addConstruct($objClass)
    {
        foreach ($objClass->getParameters() as $param) {
            $this->data->addStmt(
                new PhpParser\Node\Expr\Assign(
                    new PhpParser\Node\Expr\Variable($this->getMethodParamVariableName($param)),
                    $this->getParamCalling($param)
                )
            );
        }

        $stmt1 = new PhpParser\Node\Expr\Assign(
            new Variable('this->target'),
            new PhpParser\Node\Expr\New_(
                new PhpParser\Node\Name($objClass->getTargetClassName()),
                $this->getMethodParamsList($objClass)
            )
        );
        $this->data->addStmt($stmt1);

        return $this;
    }
}
