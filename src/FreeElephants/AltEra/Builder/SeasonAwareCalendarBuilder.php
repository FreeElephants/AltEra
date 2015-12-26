<?php

namespace FreeElephants\AltEra\Builder;

use FreeElephants\AltEra\TimeUnit\Season;
use FreeElephants\AltEra\Calendar\SeasonAwareCalendar;
use FreeElephants\AltEra\TimeUnit\SeasonInterface;

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

    protected function createCalendarInstance()
    {
        return new SeasonAwareCalendar();
    }

    public function addSeason($name, array $months)
    {
        $season = new Season($name, $months);
        $this->seasonMap[$name] = $months;
    }

    public function setFirstMonthByName($monthName)
    {

    }

    public function buildCalandar()
    {
        return $this->calendar;
    }

}