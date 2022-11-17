<?php

declare(strict_types=1);

namespace NetbrothersGmbh\AuftragsdateiParser\Command;

use NetbrothersGmbh\AuftragsdateiParser\Service\Parser;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Project: auftragsdatei-parser
 * 
 * @author Thilo Ratnaweera <info@netbrothers.de>
 * @copyright © 2022 NetBrothers GmbH.
 * @license GPLv3
 */

#[AsCommand(
    'aufparser',
    'Parser for GKV Auftragsdatei files'
)]
final class AufParserCommand extends Command
{
    private const AVAILABLE_FORMATS = [
        self::FORMAT_JSON,
        self::FORMAT_JSON_PRETTY,
        self::FORMAT_TABLE,
    ];
    private const FORMAT_JSON = 'json';
    private const FORMAT_JSON_PRETTY = 'jsonpretty';
    private const FORMAT_TABLE = 'table';

    public function __construct(public Parser $parser)
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->addArgument(
            'auftragsdatei',
            InputArgument::REQUIRED,
            'The file to be parsed (typically with an .AUF extension).'
        );
        $this->addOption(
            'format',
            null,
            InputOption::VALUE_REQUIRED,
            sprintf('one out of "%s"', implode('", "', self::AVAILABLE_FORMATS)),
            'table'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $file = $input->getArgument('auftragsdatei');
        if (! is_readable($file)) {
            $io->error(sprintf('File "%s" ist not readable.', $file));
            return Command::INVALID;
        }
        if (filesize($file) !== 348) {
            $io->error(sprintf('Invalid file size: "%s"', $file));
            return Command::INVALID;
        }
        $result = $this->parser->parse(file_get_contents($file));
        $format = $input->getOption('format');
        if (! in_array($format, self::AVAILABLE_FORMATS)) {
            $io->error(sprintf(
                '"%s" is not a valid format option. Try "%s".',
                $format,
                implode('", "', self::AVAILABLE_FORMATS)
            ));
            return Command::INVALID;
        }
        if ($format === self::FORMAT_JSON) {
            $output->write(json_encode($result->toArray()));
            return Command::SUCCESS;
        }
        if ($format === self::FORMAT_JSON_PRETTY) {
            $output->write(json_encode($result->toArray(), JSON_PRETTY_PRINT));
            return Command::SUCCESS;
        }
        $table = new Table($output);
        $table->setHeaders(['Key', 'Value'])->setRows($result->toTableArray());
        $table->render();
        return Command::SUCCESS;
    }
}
