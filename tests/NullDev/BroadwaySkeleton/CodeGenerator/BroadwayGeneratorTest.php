<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\CodeGenerator;

use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @group  FullCoverage
 * @coversNothing
 */
class BroadwayGeneratorTest extends BaseCodeGeneratorTest
{
    /**
     * @test
     * @dataProvider provideModelData
     * @dataProvider provideElasticsearchReadData
     * @dataProvider provideDoctrineOrmReadData
     */
    public function outputClass(ImprovedClassSource $classSource, string $outputName): void
    {
        $generator = $this->getService(PhpParserGenerator::class);

        $outputFilePath = $this->getFileName($outputName);

        $output = $generator->getOutput($classSource);

        if (false === file_exists($outputFilePath)) {
            file_put_contents($outputFilePath, $output);
            $this->markTestSkipped('Generating output to '.$outputFilePath);
        } else {
            $expected = file_get_contents($outputFilePath);

            self::assertEquals($expected, $output);
        }
    }

    public function provideModelData(): array
    {
        $provider = new BroadwayModelDataProvider();

        return [
            [$provider->provideUuidIdentifier(), 'code/uuid-identifier'],
            [$provider->provideBroadwayCommand(), 'code/broadway-command'],
            [$provider->provideBroadwayEvent(), 'code/broadway-event'],
            [$provider->provideBroadwayModel(), 'code/broadway-model'],
            [$provider->provideBroadwayModelRepository(), 'code/broadway-model-repository'],
        ];
    }

    public function provideElasticsearchReadData(): array
    {
        $provider = new BroadwayElasticsearchReadDataProvider();

        return [
            [$provider->provideBroadwayElasticSearchReadEntity(), 'code/read/elasticsearch/entity'],
            [$provider->provideBroadwayElasticSearchReadRepository(), 'code/read/elasticsearch/repository'],
            [$provider->provideBroadwayElasticSearchReadProjector(), 'code/read/elasticsearch/projector'],
        ];
    }

    public function provideDoctrineOrmReadData(): array
    {
        $provider = new BroadwayDoctrineOrmReadDataProvider();

        return [
            [$provider->provideBroadwayDoctrineOrmReadEntity(), 'code/read/doctrine-orm/entity'],
            [$provider->provideBroadwayDoctrineOrmReadFactory(), 'code/read/doctrine-orm/factory'],
            [$provider->provideBroadwayDoctrineOrmReadRepository(), 'code/read/doctrine-orm/repository'],
            [$provider->provideBroadwayDoctrineOrmReadProjector(), 'code/read/doctrine-orm/projector'],
        ];
    }
}
