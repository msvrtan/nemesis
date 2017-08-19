<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Cli;

use League\Tactician\CommandBus;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadEntity;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadFactory;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadProjector;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadRepository;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpSpec\Exception\Example\PendingException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @codeCoverageIgnore
 */
class BroadwayDoctrineOrmReadCliCommand extends BaseSkeletonGeneratorCommand
{
    protected function configure()
    {
        $this->setName('broadway:read:doctrine-orm')
            ->setDescription('Generates Broadway read using DoctrineORM engine')
            ->addOption('className', null, InputOption::VALUE_REQUIRED, 'Class name');
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input  = $input;
        $this->output = $output;

        $this->io = new SymfonyStyle($input, $output);

        $this->handle();
    }

    protected function handle()
    {
        $commandBus = $this->getService(CommandBus::class);

        $className            = $this->handleClassNameInput();
        $readEntityProperties = $this->getConstuctorParameters();

        //Entity
        $readEntityClassType    = ClassType::createFromFullyQualified($className.'Entity');
        $repositoryClassType    = ClassType::createFromFullyQualified($className.'Repository');
        $factoryClassType       = ClassType::createFromFullyQualified($className.'Factory');
        $readProjectorClassType = ClassType::createFromFullyQualified($className.'Projector');

        $commands = [
            new CreateBroadwayDoctrineOrmReadEntity($readEntityClassType, $readEntityProperties),
            new CreateBroadwayDoctrineOrmReadFactory($factoryClassType),
            new CreateBroadwayDoctrineOrmReadProjector($readProjectorClassType, $readEntityProperties),
            new CreateBroadwayDoctrineOrmReadRepository($repositoryClassType),
        ];

        $outputResources = [];

        foreach ($commands as $command) {
            $outputResources = array_merge($outputResources, $commandBus->handle($command));
        }

        foreach ($outputResources as $outputResource) {
            $this->handleGeneratingFile($outputResource);
        }

        $this->io->writeln('DoNE');
    }

    protected function getSectionMessage(): string
    {
        return 'Generate Broadway read models';
    }

    protected function getIntroductionMessage(): array
    {
        return [
            '',
            'This command helps you generate Broadway read model.',
            '',
            'First, you need to give the class name you want to generate.',
            'IMPORTANT!: Dont add suffixes!',
        ];
    }

    protected function createGenerator()
    {
        throw new PendingException();
    }
}
