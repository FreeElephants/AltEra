<?php
namespace FreeElephants\AltEra;

use FreeElephants\AltEra\Builder\SeasonAwareCalendarBuilder;
use FreeElephants\AltEra\Builder\MonthAwareCalendarBuilder;
use FreeElephants\AltEra\Exception\InvalidConfigurationException;
use Symfony\Component\Yaml\Yaml;

/**
 *
 * @author samizdam
 *
 */
class CalendarFactory implements CalendarFactoryInterface
{

    const FIELD_SEASONS = "seasons";

    const FIELD_MONTHS = "months";

    const FIELD_CALENDAR_NAME = "name";

    public function createFromYaml($yamlString)
    {
        $config = Yaml::parse($yamlString);
        return $this->createFromArray($config);
    }

    public function createFromArray(array $config)
    {
        $calendarName = $this->isCalendarNameProvided($config) ? $config[self::FIELD_CALENDAR_NAME] : null;

        if ($this->isSeasonAwareConfig($config)) {
            $builder = new SeasonAwareCalendarBuilder($calendarName);
            $seasons = $config[self::FIELD_SEASONS];
            foreach ($seasons as $name => $months){
                $builder->addSeason($name, $months);
            }
        } elseif ($this->isMonthAwareConfig($config)) {
            $builder = new MonthAwareCalendarBuilder($calendarName);
            $months = $config[self::FIELD_MONTHS];
            foreach ($months as $name => $numberOfDays){
                $builder->addMonth($name, $numberOfDays);
            }
        } else {
            throw new InvalidConfigurationException("Configuration must provide seasons or months units. ");
        }

        return $builder->buildCalandar();

    }

    public function createFromJson($jsonString)
    {
        $config = json_decode($jsonString);
        return $this->createFromArray($config);
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