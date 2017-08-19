<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Cli;

use League\Tactician\CommandBus;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootId;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootModel;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootRepository;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommandHandler;
use NullDev\Skeleton\Command\ContainerImplementingTrait;
use NullDev\Skeleton\Suggestions\NamespaceSuggestions;
use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;
use NullDev\Theater\Config\TheaterConfig;
use NullDev\Theater\Config\TheaterConfigFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Yaml\Yaml;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class BroadwayRunCliCommand extends BaseSkeletonGeneratorCommand
{
    use ContainerImplementingTrait;

    /** @var SymfonyStyle */
    protected $io;

    /** @var ContextName Bounded context name */
    protected $name;

    /** @var ContextNamespace Bounded context namespace */
    protected $namespace;

    protected function configure()
    {
        $this->setName('broadway:run')
            ->setDescription('Run, lola run');
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function interact(InputInterface $input, OutputInterface $output): void
    {
    }

    /** @SuppressWarnings(PHPMD.UnusedFormalParameter) */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $commandBus = $this->getService(CommandBus::class);
        $config     = $this->getTheaterConfig();

        foreach ($config->getContexts() as $context) {
            $commands = [
                CreateBroadwayAggregateRootId::create($context),
                CreateBroadwayAggregateRootModel::create($context),
                CreateBroadwayAggregateRootRepository::create($context),
                CreateBroadwayCommandHandler::create($context),
            ];

            $outputResources = [];

            foreach ($commands as $command) {
                $outputResources = array_merge($outputResources, $commandBus->handle($command));
            }

            foreach ($outputResources as $outputResource) {
                if (false === file_exists($outputResource->getFileName())) {
                    $this->handleGeneratingFile($outputResource);
                }
            }
        }

        $this->io->writeln('DoNE');
    }

    private function getTheaterConfig(): TheaterConfig
    {
        $path = getcwd().'/theater.yml';

        if (false === file_exists($path)) {
            $config = new TheaterConfig([]);

            $this->writeTheaterConfig($config);
        } else {
            $configData = Yaml::parse(file_get_contents($path));

            $config = $this->getService(TheaterConfigFactory::class)->createFromArray($configData);
        }

        return $config;
    }

    private function writeTheaterConfig(TheaterConfig $config)
    {
        $path = getcwd().'/theater.yml';
        $yaml = Yaml::dump($config->toArray(), 4, 2);
        file_put_contents($path, $yaml);
    }

    protected function handleNameInput()
    {
        $question = new Question('Enter bounded context name');
        $question->setValidator(
            function ($input) {
                return new ContextName((string) $input);
            }
        );

        return $this->io->askQuestion($question);
    }

    protected function handleNamespaceInput()
    {
        $question = new Question('Enter bounded context namespace');
        $question->setAutocompleterValues($this->getExistingNamespaces());
        $question->setValidator(
            function ($input) {
                return new ContextNamespace(str_replace('/', '\\', $input));
            }
        );

        return $this->io->askQuestion($question);
    }

    protected function getExistingNamespaces(): array
    {
        return $this->getService(NamespaceSuggestions::class)->suggest();
    }

    protected function getSectionMessage(): string
    {
        return 'Adds new Broadway bounded context';
    }

    protected function getIntroductionMessage(): array
    {
        return [
            'This command helps you adding new Broadway bounded context.',
            '',
            'First, you need to give the name & namespace for the bounded context.',
            '',
        ];
    }
}