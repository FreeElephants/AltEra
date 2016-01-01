<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\TimeUnit\SeasonInterface;
use FreeElephants\AltEra\Exception\ArgumentException;

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
    private $seasonsMap = [];

    public function addSeason(SeasonInterface $season)
    {
        $seasonName = $season->getName();
        if(array_key_exists($seasonName, $this->seasonsMap)){
            throw new ArgumentException("Season with name '{$seasonName}' already added to this calendar. ");
        }
        $this->seasonsMap[$seasonName] = $season;
    }

    public function getSeasons()
    {
        return array_values($this->seasonsMap);
    }

}