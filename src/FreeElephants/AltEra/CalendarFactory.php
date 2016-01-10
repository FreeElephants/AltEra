<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\Builder\SeasonAwareCalendarBuilder;
use FreeElephants\AltEra\Builder\MonthAwareCalendarBuilder;
use FreeElephants\AltEra\Exception\InvalidConfigurationException;
use FreeElephants\AltEra\Configuration\ConfigurationFieldEnum;
use FreeElephants\AltEra\TimeUnit\Month;
use FreeElephants\AltEra\Configuration\Configuration;
use FreeElephants\Configuration\FormatEnum;
use FreeElephants\AltEra\Configuration\ConfigurationInterface;

/**
 * Create Calendar instance from configuration.
 *
 * @author samizdam
 */
class CalendarFactory implements CalendarFactoryInterface, ConfigurationFieldEnum
{

    public function createFromJson($jsonString)
    {
        $config = Configuration::createFromString(FormatEnum::FORMAT_JSON, $jsonString);
        return $this->createFromObject($config);
    }

    public function createFromYaml($yamlString)
    {
        $config = Configuration::createFromString(FormatEnum::FORMAT_YAML, $yamlString);
        return $this->createFromObject($config);
    }

    public function createFromArray(array $array)
    {
        $config = new Configuration($array);
        return $this->createFromObject($config);
    }

    public function createFromObject(ConfigurationInterface $config)
    {
        $calendarName = $config->isCalendarNameProvided() ? $config[self::FIELD_CALENDAR_NAME] : null;

        if ($config->isSeasonAwareConfig()) {
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
            if (isset($config[self::FIELD_FIRST_MONTH_NAME])) {
                $monthName = $config[self::FIELD_FIRST_MONTH_NAME];
                $builder->setFirstMonthByName($monthName);
            }
        } elseif ($config->isMonthAwareConfig()) {
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
}
