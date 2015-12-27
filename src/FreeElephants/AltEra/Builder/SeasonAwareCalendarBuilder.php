<?php

namespace FreeElephants\AltEra\Builder;

use FreeElephants\AltEra\TimeUnit\Season;
use FreeElephants\AltEra\TimeUnit\SeasonInterface;
use FreeElephants\AltEra\Calendar\SeasonAwareCalendar;
use FreeElephants\AltEra\Exception\InvalidConfigurationException;

/**
 * Use this Builder for create Calendar with Season Unit supports,
 * Months units will be nested into its.
 *
 * @author samizdam
 *
 */
class SeasonAwareCalendarBuilder extends AbstractCalendarBuilder implements SeasonAwareCalendarBuilderInterface
{

    /**
     *
     * @var SeasonInterface[]
     */
    private $seasonMap = [];

    private $firstMonthName;

    protected function createCalendarInstance()
    {
        return new SeasonAwareCalendar();
    }

    public function addSeason($name, array $months)
    {
        $this->seasonMap[$name] = $months;
        return $this;
    }

    public function setFirstMonthByName($monthName)
    {
        $this->firstMonthName = $monthName;
        return $this;
    }

    protected function concreteBuild()
    {
        $calendar = $this->getCalendar();
        $monthsList = [];
        foreach ($this->seasonMap as $name => $months)
        {
            $season = new Season($name, $months);
            $calendar->addSeason($season);
            foreach ($months as $month){
                $monthsList[] = $month;
            }
        }

        if($this->firstMonthName !== null){
            $firstMonthNotFound = true;
            $reorderedMonthsList = [0 => null];
            foreach ($monthsList as $month){
                if($this->firstMonthName === $month->getName()){
                    $reorderedMonthsList[0] = $month;
                    $firstMonthNotFound = false;
                } else {
                    $reorderedMonthsList[] = $month;
                }
            }
            if($firstMonthNotFound){
                throw new InvalidConfigurationException("First month '{$this->firstMonthName}' not found. ");
            }
            $monthsList = $reorderedMonthsList;
        }

        foreach ($monthsList as $month){
            $calendar->addMonth($month);
        }

        return $calendar;
    }

}