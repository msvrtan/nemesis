<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Command;

use NullDevelopment\Skeleton\SourceCode;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

/**
 * @codeCoverageIgnore
 */
class GenerateAllFilesFromDefinitionCliCommand extends BaseGenerateFilesFromDefinitionCliCommand
{
    protected function configure()
    {
        $this->setName('generate:definition:all')
            ->setDescription('Generate all files from definition');
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sourceCodeDefinitions = $this->loadSourceCode();

        /** @var SourceCode $sourceCodeDefinition */
        foreach ($sourceCodeDefinitions as $sourceCodeDefinition) {
            try {
                $this->io->writeln('Processing '.$sourceCodeDefinition->getInstanceOfName());

                $results = $this->commandBus->handle($sourceCodeDefinition);
                foreach ($results as $result) {
                    $this->fileSystem->dumpFile($result->getFileName(), $result->getOutput());
                }
            } catch (Throwable $e) {
                $this->io->writeln($e->getMessage());
            }
        }

        $this->io->writeln('Done!');
    }
}
