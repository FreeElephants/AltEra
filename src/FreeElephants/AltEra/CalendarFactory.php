<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\Builder\SeasonAwareCalendarBuilder;
use FreeElephants\AltEra\Builder\MonthAwareCalendarBuilder;
use FreeElephants\AltEra\Exception\InvalidConfigurationException;
use FreeElephants\AltEra\Configuration\ConfigurationFieldEnum;
use FreeElephants\AltEra\TimeUnit\Month;
use FreeElephants\Configuration\Reader\ReaderFactory;

/**
 * @author samizdam
 */
class CalendarFactory implements CalendarFactoryInterface, ConfigurationFieldEnum
{
    private $configReaderFactory;

    public function __construct()
    {
        $this->configReaderFactory = new ReaderFactory();
    }

    public function createFromJson($jsonString)
    {
        $config = $this->configReaderFactory->createReader(ReaderFactory::FORMAT_JSON)->readString($jsonString);

        return $this->createFromArray($config);
    }

    public function createFromYaml($yamlString)
    {
        $config = $this->configReaderFactory->createReader(ReaderFactory::FORMAT_YAML)->readString($yamlString);

        return $this->createFromArray($config);
    }

    public function createFromArray(array $config)
    {
        $calendarName = $this->isCalendarNameProvided($config) ? $config[self::FIELD_CALENDAR_NAME] : null;

        if ($this->isSeasonAwareConfig($config)) {
            $builder = new SeasonAwareCalendarBuilder($calendarName);
            $seasons = $config[self::FIELD_SEASONS];
            foreach ($seasons as $seasonData) {
                $name = $seasonData['name'];
                $months = [];
                foreach ($seasonData[self::FIELD_MONTHS] as $monthData) {
                    $months[] = new Month($monthData['name'], $monthData['numberOfDays']);
                }
                $builder->addSeason($name, $months);
            }
            if (isset($config['firstMonth'])) {
                $monthName = $config['firstMonth'];
                $builder->setFirstMonthByName($monthName);
            }
        } elseif ($this->isMonthAwareConfig($config)) {
            $builder = new MonthAwareCalendarBuilder($calendarName);
            $months = $config[self::FIELD_MONTHS];
            foreach ($months as $name => $numberOfDays) {
                $builder->addMonth($name, $numberOfDays);
            }
        } else {
            throw new InvalidConfigurationException('Configuration must provide seasons or months units. ');
        }

        return $builder->buildCalandar();
    }

    private function isSeasonAwareConfig(array $config)
    {
        return array_key_exists(self::FIELD_SEASONS, $config);
    }

    private function isMonthAwareConfig(array $config)
    {
        return array_key_exists(self::FIELD_MONTHS, $config);
    }

    private function isCalendarNameProvided(array $config)
    {
        return array_key_exists(self::FIELD_CALENDAR_NAME, $config);
    }
}
