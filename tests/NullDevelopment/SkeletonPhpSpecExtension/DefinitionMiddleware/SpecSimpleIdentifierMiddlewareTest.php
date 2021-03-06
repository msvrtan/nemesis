<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSimpleIdentifierFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleIdentifierGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecSimpleIdentifierMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecSimpleIdentifierMiddleware
 * @group  todo
 */
class SpecSimpleIdentifierMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|SpecSimpleIdentifierFactory */
    private $factory;

    /** @var MockInterface|SpecSimpleIdentifierGenerator */
    private $generator;

    /** @var SpecSimpleIdentifierMiddleware */
    private $sut;

    public function setUp()
    {
        $this->factory   = Mockery::mock(SpecSimpleIdentifierFactory::class);
        $this->generator = Mockery::mock(SpecSimpleIdentifierGenerator::class);
        $this->sut       = new SpecSimpleIdentifierMiddleware($this->factory, $this->generator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
