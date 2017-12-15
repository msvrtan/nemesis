<?php

declare(strict_types=1);

namespace NullDev\Nemesis\SourceParser;

use NullDev\Nemesis\SourceParser;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GenericMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Property;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\Type;
use NullDev\Skeleton\Definition\PHP\Types\TypeFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Parser;
use PhpParser\ParserFactory;
use ReflectionClass;
use ReflectionMethod;
use ReflectionParameter;
use ReflectionType;

/**
 * @see SourceParserSpec
 * @see SourceParserTest
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
 * @SuppressWarnings(PHPMD.NPathComplexity)
 */
class ReflectionSourceParser implements SourceParser
{
    /** @var Parser */
    private $parser;
    private $namespace;

    public function __construct()
    {
        $this->parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
    }

    private function parseOutClassNames(string $code): array
    {
        $parsedStatements = $this->parser->parse($code);

        $classNames = [];
        foreach ($parsedStatements as $parsedStatement) {
            if ($parsedStatement instanceof Namespace_) {
                $this->namespace = (string) $parsedStatement->name;

                foreach ($parsedStatement->stmts as $subParsedStatement) {
                    if ($subParsedStatement instanceof Class_) {
                        $classNames[] = (string) $subParsedStatement->name;
                    }
                }
            } elseif ($parsedStatement instanceof Class_) {
                $classNames[] = (string) $parsedStatement->name;
            }
        }

        return $classNames;
    }

    public function parse(string $code): array
    {
        $results = [];

        foreach ($this->parseOutClassNames($code) as $className) {
            $results[] = new ImprovedClassSource(new ClassType($className, $this->namespace));
        }

        $results2 = [];
        /** @var ImprovedClassSource $result */
        foreach ($results as $result) {
            $results2[] = $this->parseClass($result);
        }

        return $results2;
    }

    public function parseClass(ImprovedClassSource $result): ImprovedClassSource
    {
        $reflection = new ReflectionClass($result->getFullName());

        if (true === $reflection->hasMethod('__construct')) {
            $reflectedConstructor = $reflection->getMethod('__construct');

            if (true === $reflectedConstructor->isPublic()) {
                $params = [];

                foreach ($reflectedConstructor->getParameters() as $reflectionParameter) {
                    $type = $this->createType($reflectionParameter);

                    $params[] = new Parameter($reflectionParameter->getName(), $type);
                }

                $constructorMethod = new ConstructorMethod($params);

                $result->addConstructorMethod($constructorMethod);
            }
        }

        foreach ($reflection->getProperties() as $reflectionProperty) {
            $found = false;
            foreach ($result->getConstructorParameters() as $constructorParameter) {
                if ($constructorParameter->getName() === $reflectionProperty->getName()) {
                    $found = true;

                    $result->addProperty(Property::createFromParameter($constructorParameter));
                    break;
                }
            }

            if (false === $found) {
                $result->addProperty(new Property($reflectionProperty->getName()));
            }
        }

        foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $reflectionMethod) {
            $methodName = $reflectionMethod->getName();
            if ('__construct' === $methodName) {
                continue;
            }

            $paramName = $this->isNamedLikeGetterMethod($methodName);

            if (null === $paramName) {
                $result->addMethod(new GenericMethod($methodName, [], null));
            } else {
                if (false === $result->hasPropertyNamed($paramName)) {
                    $result->addMethod(new GenericMethod($methodName, [], null));
                } elseif (false === $result->hasConstructorParameterNamed($paramName)) {
                    $result->addMethod(new GenericMethod($methodName, [], null));
                } else {
                    if (true === $reflectionMethod->hasReturnType()) {
                        $property = new Property($paramName, $this->createType2($reflectionMethod->getReturnType()));
                        $result->addMethod(new GetterMethod($methodName, $property));
                    } else {
                        $result->addMethod(new GetterMethod($methodName, $result->getPropertyNamed($paramName)));
                    }
                }
            }
        }

        return $result;
    }

    private function isNamedLikeGetterMethod(string $methodName): ?string
    {
        $prefixes = ['get', 'is', 'has'];

        foreach ($prefixes as $prefix) {
            if (0 === strpos($methodName, $prefix)) {
                return lcfirst(substr($methodName, strlen($prefix)));
            }
        }

        return null;
    }

    protected function createType(ReflectionParameter $input): ?Type
    {
        if (false === $input->hasType()) {
            return null;
        }

        return TypeFactory::create($input->getType()->__toString());
    }

    protected function createType2(ReflectionType $input): ?Type
    {
        return TypeFactory::create($input->__toString());
    }
}