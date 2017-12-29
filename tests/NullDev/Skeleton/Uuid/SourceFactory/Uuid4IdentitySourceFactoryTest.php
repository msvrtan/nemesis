<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Uuid\SourceFactory;

use Generator;
use NullDev\Skeleton\Definition\PHP\Types\ClassDefinition;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Uuid\SourceFactory\Uuid4IdentitySourceFactory;
use Tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\Skeleton\Uuid\SourceFactory\Uuid4IdentitySourceFactory
 * @group  integration
 */
class Uuid4IdentitySourceFactoryTest extends ContainerSupportedTestCase
{
    /** @var Uuid4IdentitySourceFactory */
    private $sourceFactory;

    public function setUp(): void
    {
        $this->sourceFactory = new Uuid4IdentitySourceFactory(new ClassSourceFactory());
    }

    /**
     * @dataProvider provideData
     */
    public function testOutput(ClassDefinition $inputClassDefinition, string $fileName): void
    {
        $source = $this->sourceFactory->create($inputClassDefinition);

        $this->assertClassSourceOutputMatches($fileName, $source);
    }

    public function provideData(): Generator
    {
        $data = [
            'Vendor\Namespace\SomeId' => 'SomeId',
        ];

        foreach ($data as $className => $fileName) {
            yield [
                ClassDefinition::createFromFullyQualified($className),
                __DIR__.'/sample-output/'.$fileName.'.output',
            ];
        }
    }
}
