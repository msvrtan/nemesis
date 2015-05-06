<?php

namespace NullDev\Nemesis\CodeBuilder\NikicPhpParser;

use PhpParser;

class Factory
{
    protected $factory;

    public function __construct()
    {
        $this->factory = new PhpParser\BuilderFactory();
    }

    public function variable($name)
    {
        return new PhpParser\Node\Expr\Variable($name);
    }

    public function name($name)
    {
        return new PhpParser\Node\Name($name);
    }

    public function arr()
    {
        return new PhpParser\Node\Expr\Array_();
    }

    public function assign($variableName, $expression)
    {
        return new PhpParser\Node\Expr\Assign(
            $this->variable($variableName),
            $expression
        );
    }

    public function mockeryMock($class = '')
    {
        return new PhpParser\Node\Expr\StaticCall(
            new PhpParser\Node\Name('m'),
            new PhpParser\Node\Name('mock'),
            [
                new PhpParser\Node\Name(var_export($class, true)),
            ]
        );
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

    public function methodCall($variableName, $methodName, $params)
    {
        return new PhpParser\Node\Expr\MethodCall(
            $this->variable($variableName),
            $this->name($methodName),
            $params
        );
    }

    public function method($methodName)
    {
        return $this->factory->method($methodName);
    }

    public function newInstance($class, array $params = [])
    {
        return new PhpParser\Node\Expr\New_(
            new PhpParser\Node\Name($class),
            $params
        );
    }
}
