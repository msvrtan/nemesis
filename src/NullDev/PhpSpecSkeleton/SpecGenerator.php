<?php

declare(strict_types=1);

namespace NullDev\PhpSpecSkeleton;

use Broadway\EventSourcing\EventSourcingRepository;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeGettersMethodFactory;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\InitializableMethodFactory;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\LetMethodFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use NullDev\Skeleton\Definition\PHP\Types\TraitType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @see SpecGeneratorSpec
 * @see SpecGeneratorTest
 */
class SpecGenerator
{
    /** @var ClassSourceFactory */
    private $factory;
    /** @var LetMethodFactory */
    private $letMethodFactory;
    /** @var InitializableMethodFactory */
    private $initializableMethodFactory;
    /** @var ExposeGettersMethodFactory */
    private $exposeMethodFactory;

    public function __construct(
        ClassSourceFactory $factory,
        LetMethodFactory $letMethodFactory,
        InitializableMethodFactory $initializableMethodFactory,
        ExposeGettersMethodFactory $exposeMethodFactory
    ) {
        $this->factory                    = $factory;
        $this->letMethodFactory           = $letMethodFactory;
        $this->initializableMethodFactory = $initializableMethodFactory;
        $this->exposeMethodFactory        = $exposeMethodFactory;
    }

    public function generate(ImprovedClassSource $classSource)
    {
        $specClassDefinition = ClassDefinition::createFromFullyQualified('spec\\'.$classSource->getFullName().'Spec');

        $specSource = $this->factory->createSpec($specClassDefinition);

        $specSource->addImports(...$this->getImports($classSource));
        $specSource->addParent(ClassDefinition::createFromFullyQualified(ObjectBehavior::class));

        $specSource->addMethod(
            $this->letMethodFactory->create($classSource)
        );
        $specSource->addMethod(
            $this->initializableMethodFactory->create($classSource)
        );

        if (EventSourcingRepository::class !== $classSource->getParentFullName()) {
            $specSource->addMethod($this->exposeMethodFactory->create($classSource));
        }

        return $specSource;
    }

    private function getImports(ImprovedClassSource $classSource): array
    {
        $imports = [
            $classSource->getClassDefinition(),
            ClassDefinition::createFromFullyQualified(Argument::class),
        ];

        // Add all imports from source class (except traits).
        foreach ($classSource->getImports() as $import) {
            // Traits do not need to be imported from source class.
            if (false === $import instanceof TraitType) {
                $imports[] = $import;
            }
        }

        // Add all classes used in constructor parameters as imports.
        foreach ($classSource->getConstructorParameters() as $methodParameter) {
            if (true === $methodParameter->hasType()) {
                $imports[] = $methodParameter->getType();
            }
        }

        return $imports;
    }
}
