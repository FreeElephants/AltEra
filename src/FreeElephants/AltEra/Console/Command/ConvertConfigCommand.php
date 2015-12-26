<?php

namespace FreeElephants\AltEra\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use FreeElephants\AltEra\Console\Exception\RuntimeException;
use Symfony\Component\Console\Input\InputOption;
use FreeElephants\AltEra\Configuration\ConfigurationFieldEnum;
use FreeElephants\AltEra\Configuration\ConfigurationFormatEnum;

/**
 *
 * @author samizdam
 *
 */
class ConvertConfigCommand extends Command implements ConfigurationFormatEnum
{

    const ARGUMENT_SOURCE = "source";
    const ARGUMENT_DIST = "dist";

    const OPTION_FORCE = "force";

    const OPTION_OUPUT_FORMAT = "ouput-format";
    const OPTION_INPUT_FORMAT = "input-format";

    const OPTION_DRY_RUN = "dry-run";

    private $validFormats = [
        self::FORMAT_JSON,
        self::FORMAT_PHP,
        self::FORMAT_YAML,
    ];

    protected function configure()
    {
        $this->addArgument(self::ARGUMENT_SOURCE, InputArgument::REQUIRED, "source config file");
        $this->addArgument(self::ARGUMENT_DIST, InputArgument::REQUIRED, "distance config file");

        $this->addOption(self::OPTION_INPUT_FORMAT, "i", InputOption::VALUE_OPTIONAL, "use given format for input instead file extension.");
        $this->addOption(self::OPTION_OUPUT_FORMAT, "o", InputOption::VALUE_OPTIONAL, "use given format for output instead file extension.");

        $this->addOption(self::OPTION_FORCE, "f", InputOption::VALUE_OPTIONAL, "override exists", false);
        $this->addOption(self::OPTION_DRY_RUN, null, InputOption::VALUE_OPTIONAL, "not write output", false);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inputFilename = $input->getArgument(self::ARGUMENT_SOURCE);
        $outputFilename = $input->getArgument(self::ARGUMENT_DIST);
        if(!file_exists($inputFilename)){
            throw new RuntimeException("Input file not exists. ");
        }

        if(!$inputFormat = $input->getOption(self::OPTION_INPUT_FORMAT)){
            $inputFormat = pathinfo($inputFilename, PATHINFO_EXTENSION);
        }

        $inputFormat = $this->normalizeFormat($inputFormat);

        if(!$this->isValidFormat($inputFormat)){
            throw new RuntimeException("{$inputFormat} not supported, valid values: " . join(", ", $this->validFormats));
        }

        if(!$outputFormat = $input->getOption(self::OPTION_OUPUT_FORMAT)){
            $outputFormat = pathinfo($outputFilename, PATHINFO_EXTENSION);
        }

        $outputFormat = $this->normalizeFormat($outputFormat);

        if(!$this->isValidFormat($outputFormat)){
            throw new RuntimeException("{$outputFormat} not supported, valid values: " . join(", ", $this->validFormats));
        }


    }

    /**
     *
     *
     * @param string $format
     * @return string
     */
    private function normalizeFormat($format)
    {
        $normalizedFormat = strtolower($format);
        if($normalizedFormat === 'yml'){
            $normalizedFormat = self::FORMAT_YAML;
        }
        return $normalizedFormat;
    }

    /**
     *
     *
     * @param string $format
     * @return bool
     */
    private function isValidFormat($format)
    {
        return in_array($this->normalizeFormat($format), $this->validFormats, true);
    }
}