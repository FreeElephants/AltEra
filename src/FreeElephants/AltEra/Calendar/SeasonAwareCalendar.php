<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\TimeUnit\SeasonInterface;
use FreeElephants\AltEra\TimeUnit\MonthInterface;
use FreeElephants\AltEra\Exception\LogicException;

/**
 *
 *
 * @author samizdam
 *
 */
class SeasonAwareCalendar extends Calendar implements SeasonAwareMutableCalendarInterface, SeasonAwareCalendarInterface
{

    /**
     *
     * @var SeasonInterface[]
     */
    private $seasons = [];

    public function addSeason(SeasonInterface $season)
    {
        $this->seasons[] = $season;
        foreach ($season->getMonths() as $month){
            parent::addMonth($month);
        }
    }

    public function getSeasons()
    {
        return $this->seasons;
    }

    public function addMonth(MonthInterface $month)
    {
        throw new LogicException("You can't add month into Seasons Based Calendar directly: use Seasons for grouping. ");
    }

}