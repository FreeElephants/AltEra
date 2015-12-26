<?php

namespace FreeElephants\AltEra\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use FreeElephants\AltEra\Console\Exception\RuntimeException;
use Symfony\Component\Console\Input\InputOption;
use FreeElephants\Configuration\FormatNameNormalizer;
use FreeElephants\Configuration\Reader\ReaderFactory;
use FreeElephants\Configuration\Writer\WriterFactory;

/**
 *
 * @author samizdam
 *
 */
class ConvertConfigCommand extends AbstractCommand
{

    const ARGUMENT_SOURCE = "source";
    const ARGUMENT_DIST = "dist";

    const OPTION_FORCE = "force";

    const OPTION_OUPUT_FORMAT = "output-format";
    const OPTION_INPUT_FORMAT = "input-format";

    const OPTION_DRY_RUN = "dry-run";

    const OPTION_SHOW_OUTPUT = "show-output";

    const OPTION_SHOW_INPUT = "show-input";

    public function getDefaultName()
    {
        return "convert-config";
    }

    protected function configure()
    {
        $this->addArgument(self::ARGUMENT_SOURCE, InputArgument::REQUIRED, "source config file");
        $this->addArgument(self::ARGUMENT_DIST, InputArgument::REQUIRED, "distance config file");

        $this->addOption(self::OPTION_INPUT_FORMAT, "i", InputOption::VALUE_OPTIONAL, "use given format for input instead file extension.");
        $this->addOption(self::OPTION_OUPUT_FORMAT, "o", InputOption::VALUE_OPTIONAL, "use given format for output instead file extension.");

        $this->addOption(self::OPTION_FORCE, "f", InputOption::VALUE_OPTIONAL, "override exists", false);
        $this->addOption(self::OPTION_DRY_RUN, null, InputOption::VALUE_OPTIONAL, "not write output", false);

        $this->addOption(self::OPTION_SHOW_OUTPUT, null, InputOption::VALUE_OPTIONAL, "Show output in console. ", false);
        $this->addOption(self::OPTION_SHOW_INPUT, null, InputOption::VALUE_OPTIONAL, "Show source data in output. ", false);

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inputFilename = $input->getArgument(self::ARGUMENT_SOURCE);
        $outputFilename = $input->getArgument(self::ARGUMENT_DIST);
        if(!file_exists($inputFilename)){
            throw new RuntimeException("Input file not exists. ");
        }

        $configFormatNormalizer = new FormatNameNormalizer();

        if(!$inputFormat = $input->getOption(self::OPTION_INPUT_FORMAT)){
            $inputFormat = pathinfo($inputFilename, PATHINFO_EXTENSION);
        }

        $inputFormat = $configFormatNormalizer->normalizeFormat($inputFormat);

        if(!$configFormatNormalizer->isValidFormat($inputFormat)){
            throw new RuntimeException("{$inputFormat} not supported, valid values: " . join(", ", $configFormatNormalizer->getValidFormats()));
        }

        if(!$outputFormat = $input->getOption(self::OPTION_OUPUT_FORMAT)){
            $outputFormat = pathinfo($outputFilename, PATHINFO_EXTENSION);
        }

        $outputFormat = $configFormatNormalizer->normalizeFormat($outputFormat);

        if(!$configFormatNormalizer->isValidFormat($outputFormat)){
            throw new RuntimeException("{$outputFormat} not supported, valid values: " . join(", ", $configFormatNormalizer->getValidFormats()));
        }


        $configReader = (new ReaderFactory())->createReader($inputFormat);
        $sourceData = $configReader->readFile($inputFilename);

        if($input->getOption(self::OPTION_SHOW_INPUT))
        {
            $output->writeln(file_get_contents($inputFilename));
        }

        $configWriter = (new WriterFactory())->createWriter($outputFormat);
        if($input->getOption(self::OPTION_SHOW_OUTPUT))
        {
            $distData = $configWriter->toString($data);
            $output->writeln($distData);
        }

        if(!$input->getOption(self::OPTION_DRY_RUN))
        {
            $configWriter->writeFile($outputFilename, $sourceData);
        }
    }
}