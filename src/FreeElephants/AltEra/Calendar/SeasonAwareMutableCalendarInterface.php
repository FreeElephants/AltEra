<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\TimeUnit\SeasonInterface;

/**
 *
 * @author samizdam
 * @internal
 */
interface SeasonAwareMutableCalendarInterface
{

    public function addSeason(SeasonInterface $season);
}